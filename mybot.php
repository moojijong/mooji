﻿<?php
$access_token = 'mMVdxjtQ6ytdIwN2S7XxMccIx8DMz/tKLjuDZwq7F+QVnY0VVGnpEowWM3lEJZI0g2MTrMO7TAdN/Y3zBkCLkwH4dAjsga2F338x/Jqyj4b+OwGqBhcGsfspcMTiJW0n0YFJCQVSiKqBfd+OW/GEZwdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'สวัสดีจ้า'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวัสดีคนสวย'
				];
			}
			else if($text == 'ชื่ออะไรหรอ'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวยๆอย่างฉันต้องชื่อ Mooji จ้า'
				];
			}
			else if($text == 'อยู่ไหน'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'อยู่ในใจเสมอ'
				];
			}
		
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
			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
