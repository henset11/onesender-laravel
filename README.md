# onesender-laravel

How to install:
composer require henset11/onesender

Publish config:
php artisan vendor:publish --tag=onesender-config

How to use:
Send text
OneSender::text($number, $message, $recipientType)
OneSender::text('08123456789', 'Hello', 'individual')

Send Image
OneSender::image($phone, $imageUrl, $caption, $recipientType)

Send Document
OneSender::text($phone, $documentUrl, $filename, $caption, $recipientType)

you can change recipientType to 'individual' or 'group'
