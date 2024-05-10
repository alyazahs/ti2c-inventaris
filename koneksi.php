<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "data";

$conn = mysqli_connect($server, $user, $password, $nama_database);
echo "";
if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
