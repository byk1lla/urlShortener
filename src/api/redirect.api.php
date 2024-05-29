<?php 
header('Content-Type: application/json; charset=utf-8');
require "api.init.php";
global $url;

$shortUrl = $helper::post("url");
$response = [];

try{
    if($helper->requestType() === "POST"){
        if(!empty($shortUrl)){
                $url = $url->getLongUrl($shortUrl);
                if($url){
                    $response['status'] = true;
                    $response['data'] = $url;
                }
                else{
                    $response['error'] = true;
                    $response['message'] = "Girdiğiniz Link Geçersiz veya Geçerliliğini Yitirmiş.";
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