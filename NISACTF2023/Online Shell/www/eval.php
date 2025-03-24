<?php
    /* 
        wowo
    */
    $args = @$_GET['args'];
    echo "<br>";
    if (count($args) >3) {
        echo "too many args";
        exit();
    }
    for ( $i=0; $i<count($args); $i++ ){  
        if ( !preg_match('/^\w+$/', $args[$i]) ) {
            echo "invalid args".$args[$i]."<br>";
            exit();
        }
    }
    
    $cmd = "/bin/255 " . implode(" ", $args);
    exec($cmd, $out);
    for ($i=0; $i<count($out); $i++){
        echo($out[$i]);
        echo('<br>');
    }
