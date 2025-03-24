<?php 
error_reporting(0);
highlight_file('./index.txt');
if(isset($_POST['c_ode']) && isset($_GET['num']))
{
    $code = (String)$_POST['c_ode'];
    $num=$_GET['num'];
    if(preg_match("/[0-9]/", $num))
    {
        die("no number!");
    }
    elseif(intval($num))
    {
      if(preg_match('/.+?SHCTF/is', $code))
      {
        die('no touch!');
      }
      if(stripos($code,'2023SHCTF') === FALSE)
      {
        die('what do you want');
      }
      echo $flag;
    }
}  