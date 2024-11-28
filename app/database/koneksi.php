<?php
date_default_timezone_set("Asia/Jakarta");
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_mahasiswa";
$koneksi = mysqli_connect($host, $user, $pass, $dbname) or mysqli_connect_errno();
