<?php
$url=//"https://www.primevideo.com/?ref_=av_auth_return_redir&language=pt_br";
//"https://github.com/login";
"https://www.amazon.com/ap/signin?clientContext=135-8006978-4693910&openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.primevideo.com%2Fauth%2Freturn%2Fref%3Dav_auth_ap%3Flocation%3D%2Fstorefront%2Fmovie%3Fref_%253Ddv_auth_ret&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&accountStatusPolicy=P1&openid.assoc_handle=amzn_prime_video_desktop_us&openid.mode=checkid_setup&language=pt_BR&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0";
$ch=curl_init();
$headers= [  
    
];
$payload = [
    "email"=>"luisdias04@hotmail.com",
    "password"=>"235689",
    "rememberMe"=>"true",
    
];

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    //CURLOPT_POST=> 1,
    CURLOPT_SSL_VERIFYPEER=>false,
    //CURLOPT_COOKIEFILE=>"text.txt",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION=> 1,
    CURLOPT_SSL_VERIFYHOST=> false,
    
    CURLOPT_HTTPHEADER=>$headers,
    CURLOPT_USERAGENT=> "luisdias04@hotmail.com",
    CURLOPT_CUSTOMREQUEST => "POST",
    
   /*  CURLOPT_HEADER=>true,
    CURLOPT_COOKIEFILE=>"text.txt",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_COOKIE=>"text.txt", 
    
    CURLOPT_COOKIESESSION=> true,    
    CURLOPT_COOKIEJAR=>"text.txt",
    CURLOPT_COOKIELIST=>"text.txt",
    CURLOPT_COOKIESESSION=>"text.txt", */
    CURLOPT_POSTFIELDS => $payload,
    
       
    
]);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


curl_close($ch);

echo $status_code,"<br>";
echo "<pre>";
//print_r($cabeca);
echo $response;
//echo $teste;