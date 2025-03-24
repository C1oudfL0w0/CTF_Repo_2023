<?php
// not only ++
error_reporting(0);
highlight_file(__FILE__);

if (isset($_POST['NKCTF'])) {
    $NK = $_POST['NKCTF'];
    if (is_string($NK)) {
        if (!preg_match("/[a-zA-Z0-9@#%^&*:{}\-<\?>\"|`~\\\\]/",$NK) && strlen($NK) < 105){
            eval($NK);
        }else{
            echo("hacker!!!");
        }
    }else{
        phpinfo();
    }
}
?> 