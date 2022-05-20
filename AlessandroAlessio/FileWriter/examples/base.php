<?php
//require 'vendor/autoload.php';

$file = New \AlessandroAlessio\FileWriter\FileWriter('../file.txt');
$file->write('Lorem');
$file->write('ipsum', false); // No break row

?>