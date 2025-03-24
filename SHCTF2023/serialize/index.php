<?php
highlight_file(__FILE__);
class misca{
    public $gao;
    public $fei;
    public $a;
    public function __get($key){
        $this->miaomiao();
        $this->gao=$this->fei;
        die($this->a);
    }
    public function miaomiao(){
        $this->a='Mikey Mouse~';
    }
}
class musca{
    public $ding;
    public $dong;
    public function __wakeup(){
        return $this->ding->dong;
    }
}
class milaoshu{
    public $v;
    public function __tostring(){
        echo"misca~musca~milaoshu~~~";
        include($this->v);
    }
}
function check($data){
    if(preg_match('/^O:\d+/',$data)){
        die("you should think harder!");
    }
    else return $data;
}
unserialize(check($_GET["wanna_fl.ag"])); 