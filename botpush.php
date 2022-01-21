<?php



require "vendor/autoload.php";

$access_token = '4Bp3ON6lBN7sUZbvQ/12pOlUnWMjSg9on7Avj6vmtll013Km4kPtGZvJhblSiV8ok0i94zqDSM9n0ofJt05ro0/DgAAFVuE96jncEBTbtieuV89VBPoqPzDhfN+Mvyr8n0r8iExQDgmXV3Yo9D9IZQdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'a442994d2bf1499fd9b2b771d362e7dd';

$pushID = 'U31164826a61dc970957e3edc089f87c0';
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$texttest = $event['source']['userId'];
$response = $bot->pushMessage($pushID, $texttest);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
