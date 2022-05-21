<?php
$ch=curl_init();
$headers = [
    "Authorization: Client-ID YOUR_ACCESS_KEY"
    //este registro foi da api pelo site unsplash.com, foi passado pelo cabeçalho usando curlopt httpheader
];
curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.unsplash.com/photos/random",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTPHEADER=>$headers,
    CURLOPT_HEADER=>true
]);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$content_type = curl_getinfo($ch,CURLINFO_CONTENT_TYPE);
$content_length=curl_getinfo($ch,CURLINFO_CONTENT_LENGTH_DOWNLOAD);
curl_close($ch);

echo"<pre>";
echo $status_code,"<br>";
echo $content_type,"<br>";
echo $content_length,"<br>";
echo "\n=========================response===========================\n";
echo $response;