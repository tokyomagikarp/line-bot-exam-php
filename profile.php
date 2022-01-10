<?php


$access_token = '4Bp3ON6lBN7sUZbvQ/12pOlUnWMjSg9on7Avj6vmtll013Km4kPtGZvJhblSiV8ok0i94zqDSM9n0ofJt05ro0/DgAAFVuE96jncEBTbtieuV89VBPoqPzDhfN+Mvyr8n0r8iExQDgmXV3Yo9D9IZQdB04t89/1O/w1cDnyilFU=';

$userId = 'U31164826a61dc970957e3edc089f87c0';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

