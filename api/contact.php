<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");


$botToken = 'BOT_TOKEN';
$adminIds = ['YOUR_ID'];

$raw = file_get_contents("php://input");
$input = json_decode($raw, true);


if (!$input) {
    $input = $_POST;
}

$name = isset($input['name']) ? trim($input['name']) : null;
$email = isset($input['email']) ? trim($input['email']) : null;
$message = isset($input['message']) ? trim($input['message']) : null;

if (!$name || !$email || !$message) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'name, email and message are required.']);
    exit;
}

$text = "پیام جدید:\nنام: $name\nایمیل: $email\nپیام: $message";

foreach ($adminIds as $chatId) {
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $postFields = [
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'HTML'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}

echo json_encode(['ok' => true, 'message' => 'Message sent successfully.']);