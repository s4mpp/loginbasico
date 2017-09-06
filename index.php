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
?>
<div class="container">
<div class="row">
<div class="col-xs-4 col-xs-offset-4 bg-primary margin-radius padding">
<h1 class="text-center text-danger">Login</h1>
<form method="post" class="form-group" action="login.php">
<label>E-Mail:</label>
<input type="email" name="email" class="form-control" placeholder="Digite seu E_Mail" required>
<label>Senha:</label>
<input type="password" name="pass" class="form-control" placeholder="Digite sua senha" required>
<button class="btn btn-danger form-control margin" value="submit">Login</button>
</form>
<a href="cadastrar.php"><button class="btn btn-warning form-control">Não tem uma conta?</button></a>
</div>
</div>
</div>
<!-- JavaScript -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>