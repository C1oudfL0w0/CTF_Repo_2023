<?php
error_reporting(0);
if(isset($_GET['code']) && isset($_POST['pattern']))
{
    $pattern=$_POST['pattern'];
    if(!preg_match("/flag|system|pass|cat|chr|ls|[0-9]|tac|nl|od|ini_set|eval|exec|dir|\.|\`|read*|show|file|\<|popen|pcntl|var_dump|print|var_export|echo|implode|print_r|getcwd|head|more|less|tail|vi|sort|uniq|sh|include|require|scandir|\/| |\?|mv|cp|next|show_source|highlight_file|glob|\~|\^|\||\&|\*|\%/i",$code))
    {
        $code=$_GET['code'];
        preg_replace('/(' . $pattern . ')/ei','print_r("\\1")', $code);
        echo "you are smart";
    }else{
        die("try again");
    }
}else{
    die("it is begin");
}
?>