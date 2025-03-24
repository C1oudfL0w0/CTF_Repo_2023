<?php
highlight_file(__FILE__);
header("Content-type:text/html;charset=utf-8");
require_once "waf.php";
error_reporting(0);
class getFlag{
    private $password;
    private $cmd;
    public function __destruct(){
        if($this->password=="secret"){  //how to change the private variables
            system($this->cmd);
        }
    }
}
$a = $_GET['a'];
if(isset($_GET['a'])){
    @eval(waf($a));
}
?>