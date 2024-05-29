<?php
error_reporting(E_ERROR);
session_start();
require "../packages/load.php";
$helper = new Helper();
try{
    $settings = $helper::getSettings();
    $db = new DB("mysql:host={$settings["DB"]["host"]};dbname={$settings["DB"]["name"]}",$settings["DB"]["username"]);

    $url = new UrlShortener($db,$helper);

   }
catch (Exception $ex){
    $type = get_class($ex);
    switch ($type){
        case PDOException::class:
            $settings["error"]["type"] = "VeriTabanında Bir Sorun Oluştu";
            $settings["error"]["message"] = "Veritabanı Sunucusunda Bir hata meydana geldi. <br/>Hizmetler Geçici Olarak Devre Dışı.";
        default:
            $settings["error"]["type"] = "Bir Sorun Oluştu";
            $settings["error"]["message"] = "Sunucuda Bir hata meydana geldi. <br/>Hizmetler Geçici Olarak Devre Dışı.";
    }
}