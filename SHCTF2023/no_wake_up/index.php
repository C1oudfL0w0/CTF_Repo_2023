<?php
highlight_file(__FILE__);
class flag{
    public $username;
    public $code;
    public function __wakeup(){
        $this->username = "guest";
    }
    public function __destruct(){
        if($this->username = "admin"){
            include($this->code);
        }
    }
}
unserialize($_GET['try']); 