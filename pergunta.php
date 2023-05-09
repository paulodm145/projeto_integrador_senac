<?php
$conn = mysqli_connect('localhost', 'root', '', 'proj_senac');
$result = mysqli_query($conn, 'SELECT * FROM perguntas');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <select name="perguntas" id="" style = "margin-top:5px; margin-left:5px;">
  <?php
    while ($row = mysqli_fetch_assoc($result)){
        echo "<option value = ".$row['id_perg'].">".$row['desc_perg']."</option>";
    }
  ?>
  </select>
</body>
</html>