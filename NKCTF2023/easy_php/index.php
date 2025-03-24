<?php 
    highlight_file(__FILE__);
    error_reporting(0);
    if($_GET['a'] != $_GET['b'] && md5($_GET['a']) == md5($_GET['b'])){// md5弱类型比较
        if((string)$_POST['c'] != (string)$_POST['d'] && sha1($_POST['c']) === sha1($_POST['d'])){ // sha1强等于
            if($_GET['e'] != 114514 && intval($_GET['e']) == 114514){ // intval()函数特性
                if(isset($_GET['NS_CTF.go'])){ //非法传参 [解析为_使后面的.不转换为_
                    if(isset($_POST['cmd'])){
                        if(!preg_match('/[0-9a-zA-Z]/i', $_POST['cmd'])){ //取反或异或
                            eval($_POST['cmd']);
                        }else{
                            die('error!!!!!!');
                        }
                    }else{
                        die('error!!!!!');
                    }
                }else{
                    die('error!!!!');
                }
            }else{
                die('error!!!');
            }
        }else{
            die('error!!');
        }
    }else{
        die('error!');
    }
?>