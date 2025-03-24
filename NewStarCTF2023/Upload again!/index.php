<?php
$file = $_FILES["file"];
if(!empty($_FILES["file"])){
$fileName='./upload/'.$file['name'];
$extension = @strtolower(end(explode('.',$_FILES['file']['name'])));
if(preg_match("/ph/i",$extension)){
die("你打不开的，别试了");
}
$content = file_get_contents($_FILES["file"]["tmp_name"]);
if(preg_match("/\<\? /i",$content)){ die("这不还是php?"); }else{ move_uploaded_file($file['tmp_name'],$fileName); echo "upload successful: /upload/" . $file["name"] . "<br>" ; } } ?>