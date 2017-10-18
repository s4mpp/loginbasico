<?php
session_start();
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    require "config.php";
    $conf = new Conf();
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $conf->select("users", array("email"=>$email,"pass"=>$pass));
    $_SESSION = $conf->resultArray();
if($conf->resultRowCount() > 0){
    header('Location: DGP.php');
    exit;
}else{
    echo "Seu Email ou sua senha esta errado";
}}else{
    header("Location: index.php");
    exit;
}