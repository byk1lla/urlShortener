<?php 

Class Server{

    private $host;

    private $port;

    private $dir;



    public function __construct($host,$port = 80,$dir = "") {
        $this->host = $host;
        $this->port = $port;
        $this->dir = $dir;
    
    }

    public function start(){

        shell_exec("php -S $this->host:$this->port -t $this->dir");
    }
}