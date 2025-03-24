<?php
highlight_file(__FILE__);

class B{
    public $pop;
    public $i;
    public $nogame;

    public function __destruct()
    {
        if(preg_match("/233333333/",$this->pop)){
            echo "这是一道签到题，不能让新生一直做不出来遭受打击";
        }
    }

    public function game(){
        echo "扣1送地狱火";
        if ($this->i = "1"){
            echo '<img src=\'R.jpg\'>';
            $this->nogame->love();
        }
    }

    public function __clone(){
        echo "必须执行";
        eval($_POST["cmd"]);
    }
}


class A{
    public $Aec;
    public $girl;
    public $boy;

    public function __toString()
    {
        echo "I also want to fall in love";
        if($this->girl != $this->boy && md5($this->girl) == md5($this->boy)){
            $this->Aec->game();
        }
    }
}


class P{
    public $MyLover;
    public function __call($name, $arguments)
    {
        echo "有对象我会在这打CTF???看我克隆一个对象！";
        if ($name != "game") {
            echo "打游戏去，别想着对象了";
            $this->MyLover = clone new B;
        }
    }
}


if ($_GET["A_B_C"]){
    $poc=$_GET["A_B_C"];
    unserialize($poc);
} 