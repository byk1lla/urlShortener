<?php 
header('Content-Type: application/json; charset=utf-8');
require "api.init.php";
global $url;

$longUrl = $helper::post("url");
$response = [];

try{
    if($helper->requestType() === "POST"){
        if(!empty($longUrl)){
            if($helper::is_url($longUrl)){
                $code = $url->addUrl($longUrl);

                $response['status'] = true;
                $response['data'] = $code;
            }else{
                $response['error'] = true;
                $response['message'] = "URL Girmeniz Gerekiyor";
            }
        }
        else{
            $response['error'] = true;
            $response['message'] = "Url Girmeniz Gerekiyor.";
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Geçersiz İstek.";
    }
}catch(Exception $ex){
    $response["error"]["type"] = get_class($ex);
    $response["error"]["message"] = "Bir Hata Olutşu Lütfen Daha Sonra Tekrar Deneyin.";
}

echo json_encode($response);
