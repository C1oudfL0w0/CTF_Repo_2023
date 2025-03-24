<?php
highlight_file(__FILE__);
error_reporting(0);

$query = $_SERVER['QUERY_STRING'];

if (preg_match('/_|%5f|\.|%2E/i', $query)) {
    die('You are Hacker!');
}
if($_GET['k_e_y'] !=='123' && preg_match('/^123$/',$_GET['k_e_y'])){
    echo("You are will Win!<br>");
    if(isset($_POST['command'])){
        $command = $_POST['command'];
        if(!preg_match("/\~|\`|\@|\#|\\$|\%|\&|\*|\（|\）|\-|\+|\=|\{|\}|\[|\]|\:|\'|\"|\,|\<|\.|\>|\/|\?|\\\\/i",$command)){
            eval($command);
        }
        else{
            echo("You are Hacker!");
        }
    }
}
else{
    echo("K_e_y is Errors!");
} 