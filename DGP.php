<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap</title>
    <meta name="viewport" content="width=device-width" >
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/style.css" media="screen">
</head>
<body class="bg-success">
<?php
session_start();
require_once('verificacao.php');
?>
<div class="container">
<div class="row">
<div class="col-xs-4 col-xs-offset-4 bg-primary margin-radius padding">
<?php echo "<h1 class='text-center text-danger'>".$_SESSION['name']."</h1>"; ?>
<a href="editar.php"><button class="btn btn-warning form-control">Editar Conta</button></a>
<a href="logout.php"><button class="btn btn-danger form-control margin">Sair</button></a>
</div>
</div>
</div>
</body>
</html>