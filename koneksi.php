<?php
$host = "localhost";
$db = "hotel_db";
$uname = "root";
$pass = "";

$koneksi = mysqli_connect($host, $uname, $pass, $db);

if(!$koneksi)
{
    echo "koneksi ke database gagal : ". mysqli_connect_error();
}
?>