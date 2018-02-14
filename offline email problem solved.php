# .env file should look like this

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=gmail
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls

# Should add below code in /config/mail.php ( worked on laravel 5.4 )

'stream' => [
'ssl' => [
    'allow_self_signed' => true,
    'verify_peer' => false,
    'verify_peer_name' => false,
],
],