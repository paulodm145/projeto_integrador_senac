<?php
if(!$pass_decode) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'proj_senac');
$pass_valid = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usuarios WHERE pass = md5('$pass_decode') AND email = '$mail_decode'"));

?>