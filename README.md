# onesender-laravel

How to install: <br>
composer require henset11/onesender-laravel <br><br>

Publish config: <br>
php artisan vendor:publish --tag=onesender-laravel-config <br><br>

How to use: <br>
Send text <br>
OneSender::text($number, $message, $recipientType) <br>
OneSender::text('08123456789', 'Hello', 'individual') <br><br>

Send Image <br>
OneSender::image($phone, $imageUrl, $caption, $recipientType) <br><br>

Send Document <br>
OneSender::text($phone, $documentUrl, $filename, $caption, $recipientType) <br><br>

you can change recipientType to 'individual' or 'group'
