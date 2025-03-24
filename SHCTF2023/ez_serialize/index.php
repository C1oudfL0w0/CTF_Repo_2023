<?php
highlight_file(__FILE__);

class A
{
    public $var_1;

    public function __invoke()
    {
        include($this->var_1);
    }
}

class B
{
    public $q;
    public function __wakeup()
    {
        if (preg_match("/gopher|http|file|ftp|https|dict|\.\./i", $this->q)) {
            echo "hacker";
        }
    }
}
class C
{
    public $var;
    public $z;
    public function __toString()
    {
        return $this->z->var;
    }
}

class D
{
    public $p;
    public function __get($key)
    {
        $function = $this->p;
        return $function();
    }
}

if (isset($_GET['payload'])) {
    unserialize($_GET['payload']);
}