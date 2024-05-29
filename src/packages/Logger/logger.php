<?php
class Logger {

    
    private $logpath;

    public function __construct($logPath) {
        $this->logpath = $logPath;


    }

     

    public function error($exception, $exceptionMsg) {
        $logMessage = "[" . date('Y-m-d H:i:s') . " - $exception] - " . $exceptionMsg . PHP_EOL;
        
        file_put_contents($this->logpath . "\\" . date("Y-m-d") . "-$exception.txt", $logMessage, FILE_APPEND);

    }

    public function write($action, $msg) {
        $logMessage = "[" . date('Y-m-d H:i:s') . " - $action] - " . $msg . PHP_EOL;
        return file_put_contents($this->logpath . "\\" . date("Y-m-d") . "-$action-log.txt", $logMessage, FILE_APPEND);
       
    }
}
