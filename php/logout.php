<?php
session_start();
$id = $_SESSION['id'];
date_default_timezone_set('America/Sao_Paulo');
$date_decode = date("Y-m-d");
$time_decode = date("H:i:s");
$conn = mysqli_connect('localhost', 'root', '', 'projeto');
mysqli_query($conn, "INSERT INTO `acess_logs`(`usuario`, `acess_date`, `acess_time`, `way`) VALUES ('$id','$date_decode','$time_decode', 'OUT')");
session_destroy();
header('Location: ../index.php');
exit();