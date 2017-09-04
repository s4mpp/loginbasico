<?php
session_start();
$email = addslashes($_POST['email']);
$pass = md5(addslashes($_POST['pass']));
try {
    $db = "mysql:dbname=DGP;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO ($db, $dbuser, $dbpass);
    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){

    }else{
    echo "Seu Email ou sua senha esta errado";
    }
}catch (PDOException $e){
    echo "Erro: ".$e->getMessage();
}
?>