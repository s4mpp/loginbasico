<!DOCTYPE html>
<html>
<head>
    <title>Edite sua conta</title>
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
<form method="post" class="form-group margin" action="edit.php">
<label>Nome:</label>
<input type="text" name="name" class="form-control" placeholder="Digite seu Nome" value="<?php echo $_SESSION['name']; ?>" >
<label>Sobrenome:</label>
<input type="text" name="lastname" class="form-control" placeholder="Digite seu Sobrenome" value="<?php echo $_SESSION['lastname']; ?>" >
<label>E-Mail:</label>
<input type="email" name="email" class="form-control" placeholder="Digite seu E_Mail" value="<?php echo $_SESSION['email']; ?>" required>
<label>Senha:</label>
<input type="password" name="pass" class="form-control" placeholder="Digite sua senha">
<label>Confirma Senha:</label>
<input type="password" name="pass2" class="form-control" placeholder="Confirma senha">
<button class="btn btn-info form-control margin" value="submit" style="color:black;">Enviar</button>
</form>
<a href="delete.php"><button class="btn btn-danger form-control" value="submit" style="color:black;">Deletar Conta</button></a>
<a href="DGP.php"><button class="btn btn-warning form-control margin" value="submit" style="color:black;">Voltar</button></a>
</div>
</div>
</div>
</body>