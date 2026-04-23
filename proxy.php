<?php
// ڕێکپێدان ب مالپەرێ تە کو پەیوەندیێ پێڤە بکەت
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// کلیلا تە یا سامبانۆڤا ل ڤێرە دهێتە پاراستن (کەس نابینیت)
$api_key = "29456fa9-c1c8-47df-a5ad-8ad892f0cccd";
$url = "https://api.sambanova.ai/v1/chat/completions";

// وەرگرتنا داتایان ژ مالپەرێ تە
$data = file_get_contents('php://input');

// فرێکرنا داتایان بۆ سامبانۆڤا
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $api_key,
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

// زڤڕاندنا بەرسڤێ بۆ مالپەرێ تە
echo $response;
?>
