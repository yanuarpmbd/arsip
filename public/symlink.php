<?php

$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/storage/SK/';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/SK';
var_dump($linkFolder);
symlink($targetFolder, $linkFolder);
echo readlink($linkFolder);

?>

<?php

symlink('/home/dpmptspjateng/arsip/storage/app/storage/SK/', '/home/dpmptspjateng/public_html/arsip/storage');

