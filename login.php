<?php
session_start();
$email = addslashes($_POST['email']);
$pass = md5(addslashes($_POST['pass']));
try {
    $db = "mysql:dbname=DGP;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO ($db, $dbuser, $dbpass);
    if(isset($email) && !empty($email) && isset($pass) && !empty($pass)){
    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
    $sql->fetch();
    header("Location: verificacao.php");
    exit;
    }}else{
    echo "senha ou email errado";
    }
}catch (PDOException $e){
    echo "Erro: ".$e->getMessage();
}
?>