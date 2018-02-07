<?php
$access_token = 'mMVdxjtQ6ytdIwN2S7XxMccIx8DMz/tKLjuDZwq7F+QVnY0VVGnpEowWM3lEJZI0g2MTrMO7TAdN/Y3zBkCLkwH4dAjsga2F338x/Jqyj4b+OwGqBhcGsfspcMTiJW0n0YFJCQVSiKqBfd+OW/GEZwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>