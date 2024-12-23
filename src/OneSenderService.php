<?php

namespace Henset11\OneSender;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class OneSenderService
{
    protected $client;
    protected $headers;
    protected $senderUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->headers = [
            'Authorization' => 'Bearer ' . config('onesender.api_key'),
            'Content-Type' => 'application/json'
        ];
        $this->senderUrl = config('onesender.base_api_url') . '/api/v1/messages';
    }

    public function sendtext($phone, $message, $recipientType)
    {
        return $this->send([
            'recipient_type' => $recipientType,
            'to' => $recipientType == 'individual' ? $this->formatPhone($phone) : $phone,
            'type' => 'text',
            'text' => [
                'body' => $message
            ]
        ]);
    }

    public function image($phone, $imageUrl, $caption, $recipientType)
    {
        return $this->send([
            'recipient_type' => $recipientType,
            'to' => $recipientType == 'individual' ? $this->formatPhone($phone) : $phone,
            'type' => 'image',
            'image' => [
                'link' => $imageUrl,
                'caption' => $caption
            ]
        ]);
    }

    public function document($phone, $documentUrl, $filename, $caption, $recipientType)
    {
        return $this->send([
            'recipient_type' => $recipientType,
            'to' => $recipientType == 'individual' ? $this->formatPhone($phone) : $phone,
            'type' => 'document',
            'document' => [
                'link' => $documentUrl,
                'caption' => $caption,
                'filename' => $filename
            ]
        ]);
    }

    protected function formatPhone($phone)
    {
        $phone = preg_replace('/[^0-9]+/', '', $phone);
        return substr($phone, 0, 2) !== '62' ? '62' . ltrim($phone, '0') : $phone;
    }

    protected function send(array $data)
    {
        try {
            $request = new Request(
                'POST',
                $this->senderUrl,
                $this->headers,
                json_encode($data)
            );

            $response = $this->client->sendAsync($request)->wait();
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            throw new \Exception('OneSender Error: ' . $e->getMessage());
        }
    }
}
