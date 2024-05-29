<?php 

require "init.php";
global $helper;
date_default_timezone_set("Europe/Istanbul");
setlocale(LC_TIME,"tr_TR");
$page = $_GET['page'] ?? "home";

$type = $_GET['type'] ?? null;
if($page){
    
    $filePath = "src/inc/pages/{$page}.page.php";
        if (file_exists($filePath)) {
            if($settings["error"]){
                $helper::setTitle("HATA!");
            }else{
                
                $helper::setTitle(ucfirst($page));
            }
        } else {
            $helper::setTitle("Sayfa Bulunamadı.");
        }
}
require "src/assets/php/header.php";
switch ($page) {
    default:
    if ($page) {
        $filePath = "src/inc/pages/{$page}.page.php";
        if($settings["bakim"]){
            $filePath = "src/inc/pages/bakimdayiz.page.php";
        }
        if (file_exists($filePath)) {
            if($settings["error"]){
                $helper::setTitle("Bir Hata Meydana Geldi!");
            }else{

                require_once $filePath;
            }
        } else {
            http_response_code(404);
        }
    } else {

       header("Location: /home");
    }
    break;
        
}


require "src/assets/php/footer.php";