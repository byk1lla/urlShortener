<?php 

class UrlShortener {
    private $db;
    private $helper;

    public function __construct($db, Helper $helper) {
        $this->db = $db;
        $this->helper = $helper;
    }

    private function generateShortCode($length = 6): string{
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    private function generatetoken($url): string{
        return $this->helper->uniqueID($url);
    }

    public function addUrl($longUrl) {
        $shortCode = $this->generateShortCode();
        $token = $this->generatetoken($longUrl);
        
        $data = [
            "long_url" => $longUrl,
            "token" => $token,
            "short_code" => $shortCode,
            "IP" => $this->helper::getuserIP()
        ];
        $this->db->insert("urls", $data);
        return $shortCode;
    }

    public function getLongUrl($shortCode) {
        $result = $this->db->query("urls", ["short_code" => $shortCode]);
        if ($result) {
            return $result["long_url"];
        }
        return null;
    }

    public function deleteUrl($shortCode) {
        return $this->db->delete("urls", ["short_code" => $shortCode]);
    }

    public function fetchAllUrls() {
        return $this->db->queryAll("urls", []);
    }

    public function updateUrl($shortCode, $newLongUrl) {
        return $this->db->update("urls", ["long_url" => $newLongUrl], "short_code = '$shortCode'");
    }
}