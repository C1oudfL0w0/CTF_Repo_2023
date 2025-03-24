<?php
error_reporting(0);
highlight_file(__FILE__);

class Start{
    public $barking;
    public function __construct(){
        $this->barking = new Flag;
    }
    public function __toString(){
            return $this->barking->dosomething();
    }
}

class CTF{ 
    public $part1;
    public $part2;
    public function __construct($part1='',$part2='') {
        $this -> part1 = $part1;
        $this -> part2 = $part2;
        
    }
    public function dosomething(){
        $useless   = '<?php die("+Genshin Impact Start!+");?>';
        $useful= $useless. $this->part2;
        file_put_contents($this-> part1,$useful);
    }
}
class Flag{
    public function dosomething(){
        include('./flag,php');
        return "barking for fun!";
        
    }
}

    $code=$_POST['code']; 
    if(isset($code)){
       echo unserialize($code);
    }
    else{
        echo "no way, fuck off";
    }
?> 