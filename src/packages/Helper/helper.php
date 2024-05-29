<?php
class Helper{
    private static $settings;
    public $mail;
    public function __construct()
    {
        self::$settings = require_once "settings.php";
    }

    public static function loadPackages(){
        if(file_exists("../src/config/packages/load.php")){
            require "../src/config/packages/load.php";
        }else{
            throw new Exception("Load.php Bulunamadı!");
        }
    }


    public static function popup($title,$message,$type){
       echo "<script>popUp('$title','$message','$type')</script>";
    }

    public static function checkLogin()
    {
        if(self::session("username")){
            return true;
        }
        else{
            return false;
        }
    }

    

    public static function formatTime($tarih,bool $year = false) {

        $tarih = date("Y-m-d", strtotime($tarih));

        list($yil, $ay, $gun) = explode("-", $tarih);
        
        $aylar = array(
            '01' => 'Ocak',
            '02' => 'Şubat',
            '03' => 'Mart',
            '04' => 'Nisan',
            '05' => 'Mayıs',
            '06' => 'Haziran',
            '07' => 'Temmuz',
            '08' => 'Ağustos',
            '09' => 'Eylül',
            '10' => 'Ekim',
            '11' => 'Kasım',
            '12' => 'Aralık'
        );

        // Türkçe gün isimleri
        $gunler = array(
            'Monday' => 'Pazartesi',
            'Tuesday' => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday' => 'Perşembe',
            'Friday' => 'Cuma',
            'Saturday' => 'Cumartesi',
            'Sunday' => 'Pazar'
        );
        if($year){

            $formatli_tarih =   $gun . " " . $aylar[$ay] ." ".  $yil . " ".$gunler[date("l", strtotime($tarih))] ;
        }else{
            $formatli_tarih =   $gun . " " . $aylar[$ay] .  " ".$gunler[date("l", strtotime($tarih))] ;
        }
        return $formatli_tarih;
    }


    public static function currentTime(){
        $current_time = new DateTime();
        $new_time = $current_time->modify("+1 Hours")->format("Y-m-d H:i:s");
        return $new_time;
    }
    
    
    public static function randomdigit() {
        $rastgeleSayi = '';
        for ($i = 0; $i < 6; $i++) {
            $rastgeleSayi .= mt_rand(0, 9); 
        }
        return $rastgeleSayi;
    }

    public static function getuserIP(){
        return  $_SERVER["REMOTE_ADDR"];
    }

  
    public static function redirect(string $page)
    {
       echo "<script>window.location.href = '/$page';</script>";
    }

    public static function getTitle(){
        return self::$settings["title"] ?? "Webpanel";
    }

    public static function setTitle($title){
        self::$settings["title"] = $title;
    }
    public static function uniqueID(string $username){
        $randomString = bin2hex(random_bytes(5));
        $uniqueID = hash('sha256', $username . $randomString . microtime(true));
        $uniqueID = substr($uniqueID, 0, 20);

        return $uniqueID;
    }

    public static function getSettings()
    {
        if (is_array(self::$settings)){
            return self::$settings;
        }
    }
    public static function requireClass($className,$classpath = ""){
        if($classpath){
            $filePath = $classpath . $className . ".class.php";
            if(file_exists($filePath)){
                return $filePath;
            }
            else{
                return null;
            }
        }else{
            $filePath = "src/config/$className.class.php";
            if(file_exists($filePath)){
                return $filePath;
            }
            else{
                return null;
            }
        }


//
    }
    public static function is_url($url){
        return filter_var($url,FILTER_VALIDATE_URL);
    }

    public  function requestType() {
        return $this->server('REQUEST_METHOD');
    }

    public static function get($valueName){
        return $_GET[$valueName];
    }
    public static function post($valueName){
        return $_POST[$valueName];

    }
    public static function session($valueName){
        return $_SESSION[$valueName];
    }
    public static function server($valueName){
        return $_SERVER[$valueName];


    }

}
