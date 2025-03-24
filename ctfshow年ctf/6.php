<?php
class happy2year
{
    private $secret;
    private $key;
    function __construct(){
        $this->key=$this;
    }
}
$a = new happy2year();
echo (serialize($a));
echo "\n";
echo urlencode(serialize($a));
