<?php
session_start();
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
try {
    $db = "mysql:dbname=DGP;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO ($db, $dbuser, $dbpass);
    if (isset($name) && empty($name)){
    echo "Preencha seu nome";
    }elseif (isset($lastname) && empty($lastname)){
    echo "Preencha seu sobrenome";
    }elseif ($pass != $pass2){
    echo "As senhas não coensidem";
    }elseif (isset($email) && !empty($email)){
    $name = addslashes($name);
    $lastname = addslashes($lastname);
    $email = addslashes($email);
    $pass = md5(addslashes($pass));
    $sql = "INSERT INTO users (email, pass, name, lastname) VALUES ('$email', '$pass', '$name', '$lastname')";
    $sql = $pdo->query($sql);
    header('Location: index.php');
    exit;
    }else{
    echo "Falha ao criar conta";
    }
}catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}
?>