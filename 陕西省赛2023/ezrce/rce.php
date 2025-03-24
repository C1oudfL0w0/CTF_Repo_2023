<?php
error_reporting(0);
include 'waf.php';
header("Content-Type:text/html;charset=utf-8");
echo "你是谁啊哥们？把钥匙给我！！！！<br/>";
$key=$_GET['key'];
$name=$_POST['name'];
$qaq=waf($_POST['qaq']);
if (isset($_GET['key'])){
  highlight_file(__FILE__);
}
if (isset($name))
{
    echo "你是".$name."大人????<br/>";
    $name1=preg_replace('/hahaha/e',$qaq,$name);
    echo "骗我的吧，你明明是    >>>>小小".$name1;
}
?>