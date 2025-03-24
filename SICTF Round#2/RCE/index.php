<?php
error_reporting(0);
highlight_file(__FILE__);
$code = $_POST['code'];
$code = str_replace("(","hacker",$code);
$code = str_replace(".","hacker",$code);
eval($code);
?>