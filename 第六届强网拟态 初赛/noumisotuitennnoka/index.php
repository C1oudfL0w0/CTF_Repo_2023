<?php
highlight_file(__FILE__);
$dir = '/tmp';
$htContent = <<<EOT
<Files "backdoor.php">
    Deny from all
</Files>
EOT;
$action = $_GET['action'] ?? 'create';
$content = $_GET['content'] ?? '<?php echo file_get_contents("/flag");@unlink(__FILE__);';
$subdir = $_GET['subdir'] ?? '/jsons';

if(!preg_match('/^\/\.?[a-z]+$/', $subdir) || strlen($subdir) > 10)
    die("....");

$jsonDir = $dir . $subdir;
$escapeDir = '/var/www/html' . $subdir; 
$archiveFile = $jsonDir . '/archive.zip';


if($action == 'create'){
    // create jsons/api.json
    @mkdir($jsonDir);
    file_put_contents($jsonDir. '/backdoor.php', $content);
    file_put_contents($jsonDir.'/.htaccess',$htContent);
}
if($action == 'zip'){
    delete($archiveFile);
    // create archive.zip
    $dev_dir = $_GET['dev'] ?? $dir;
    if(realpath($dev_dir) !== $dir)
        die('...');
    $zip = new ZipArchive();
    $zip->open($archiveFile, ZipArchive::CREATE);
    $zip->addGlob($jsonDir . '/**', 0, ['add_path' => 'var/www/html/', 'remove_path' => $dev_dir]);
    $zip->addGlob($jsonDir . '/.htaccess', 0, ['add_path' => 'var/www/html/', 'remove_path' => $dev_dir]);
    $zip->close();
}
if($action == 'unzip' && is_file($archiveFile)){
    $zip = new ZipArchive();
    $zip->open($archiveFile);
    $zip->extractTo('/');
    $zip->close();
}
if($action == 'clean'){
    if (file_exists($escapeDir))
        delete($escapeDir);
    else
        echo "Failed.(/var/www/html)";
    if (file_exists($jsonDir))
        delete($jsonDir);
    else
        echo "Failed.(/tmp)";
}

function delete($path){
    if(is_file($path))
        @unlink($path);
    elseif (is_dir($path)) 
        @rmdir($path);
}