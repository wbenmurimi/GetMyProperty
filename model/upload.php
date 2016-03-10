<?php
$tempname=$_FILES["myFile"]["temp_name"];
$filename=$_FILES["myFile"]["name"];
$path="../image.$filename";
move_uploaded_file($tempname, $path);


?>