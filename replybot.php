<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = '4Bp3ON6lBN7sUZbvQ/12pOlUnWMjSg9on7Avj6vmtll013Km4kPtGZvJhblSiV8ok0i94zqDSM9n0ofJt05ro0/DgAAFVuE96jncEBTbtieuV89VBPoqPzDhfN+Mvyr8n0r8iExQDgmXV3Yo9D9IZQdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'a442994d2bf1499fd9b2b771d362e7dd';

$pushID = 'U31164826a61dc970957e3edc089f87c0';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
// Loop through each event
foreach ($events['events'] as $event) {
// Reply เฉพาะคนที่ต้องการ
// if ($event['source']['userId'] == 'Uc05fb00900a98b2bc9e988e66cff987c'){
// Reply only when message sent is in 'text' format
if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
// Get text sent
$text = $event['source']['userId'];
// Get replyToken
$replyToken = $event['replyToken'];
// Build message to reply back
$messages = [
'type' => 'text',
'text' => 'สวัสดี'
];
// Make a POST Request to Messaging API to reply to sender
$url = 'https://api.line.me/v2/bot/message/reply';
$data = [
'replyToken' => $replyToken,
'messages' => [$messages],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
// $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
// $response = $bot->pushMessage($pushID, $textMessageBuilder);
echo $result . "\r\n";
// echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
}
}
}
// }
echo "OK";