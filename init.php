<?php
session_start();
error_reporting(E_ERROR);

require "src/packages/load.php";
$helper = new Helper();
$settings = $helper::getSettings();
$logger = new Logger("D:\\xampp\\logs\\{$settings["PROJECT_NAME"]}");
try{
    
}
catch(PDOException $e){
    $settings["error"]["type"] = "VeriTabanında Bir Sorun Oluştu";
    $settings["error"]["message"] = "Veritabanı Sunucusunda Bir hata meydana geldi. <br/>Hizmetler Geçici Olarak Devre Dışı.";
    echo $logger->error(get_class($e),$e->getmessage());
}
catch (Exception $ex){
    $type = get_class($ex);
    $settings["error"]["type"] = "Bir Sorun Oluştu";
    $settings["error"]["message"] = "Sunucuda Bir hata meydana geldi. <br/>Hizmetler Geçici Olarak Devre Dışı.";
    echo $logger->error($type,$ex->getmessage());
}
