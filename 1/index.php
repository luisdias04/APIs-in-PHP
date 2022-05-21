<?php

$response = file_get_contents("https://randomuser.me/api");
$data = json_decode($response, true);
echo $data["results"][0]["name"]["first"], "\n";
echo"<pre>";
print_r($data);
echo"</pre>"; 