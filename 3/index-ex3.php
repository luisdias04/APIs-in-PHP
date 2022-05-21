<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');
$response = curl_exec($ch);
curl_close($ch);
echo $response,"\n";
