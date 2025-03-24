<?php
if($_FILES["file"]["size"]>0){
if ($_FILES["file"]["error"] > 0) {
echo "错误！！！！！！";
die();
} else {
$filename="./uploads/".$_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
sleep(0.01);
unlink($filename);
}
}else{
echo "你根本就没有上传，你到底在干什么？！";
die();
}
?>
<div><img src="smile.gif" alt="" /></div>
<h1>当你看见我的时候,你已经输了</h1>
<h1>一次战胜不了我，那就多来几次吧，万一你运气好比我快呢？</h1>