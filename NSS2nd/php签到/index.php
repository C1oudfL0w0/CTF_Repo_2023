<?php

function waf($filename){
    $black_list = array("ph", "htaccess", "ini");
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    foreach ($black_list as $value) {
        if (stristr($ext, $value)){
            return false;
        }
    }
    return true;
}

if(isset($_FILES['file'])){
    $filename = urldecode($_FILES['file']['name']);
    $content = file_get_contents($_FILES['file']['tmp_name']);
    if(waf($filename)){
        file_put_contents($filename, $content);
    } else {
        echo "Please re-upload";
    }
} else{
    highlight_file(__FILE__);
} 