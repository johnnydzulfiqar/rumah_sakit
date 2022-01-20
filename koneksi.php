<?php
$server         ="localhost";
$user           ="naufa";
$password       ="dolby123";
$nama_database  ="uas";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Database Unreachable" . mysqli_connect_error());
 } //else echo "Terkoneksi";
?>