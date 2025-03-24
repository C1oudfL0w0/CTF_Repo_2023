<?php
    error_reporting(0);
    class Welcome{
        public $name;
        public $arg = 'oww!man!!';
        public function __construct(){
            $this->name = 'ItS SO CREAZY';
        }
        public function __destruct(){
            if($this->name == 'welcome_to_NKCTF'){
                echo $this->arg;	//此处可调用__toString
            }
        }
    }

    function waf($string){
        if(preg_match('/f|l|a|g|\*|\?/i', $string)){
            die("you are bad");
        }
    }
    class Happy{
        public $shell;
        public $cmd;
        public function __invoke(){
            $shell = $this->shell;
            $cmd = $this->cmd;
            waf($cmd);
            eval($shell($cmd));
        }
    }
    class Hell0{
        public $func;
        public function __toString(){
            $function = $this->func;
            $function();	//此处可调用__invoke
        }
    }

    if(isset($_GET['p'])){
        unserialize($_GET['p']);
    }else{
        highlight_file(__FILE__);
    }
?>