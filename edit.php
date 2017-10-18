<?php
session_start();
require "config.php";
$conf = new Conf();
if (isset($_POST['name']) && empty($_POST['name'])){
   echo "Preencha seu nome";
}elseif (isset($_POST['lastname']) && empty($_POST['lastname'])){
   echo "Preencha seu sobrenome";
}elseif (isset($_POST['email']) && !empty($_POST['email'])){
   $conf->update("users", array("email"=>$_POST['email'],"name"=>$_POST['name'],"lastname"=>$_POST['lastname']), array("id"=>$_SESSION['id']));
}
if($_POST['pass'] != $_POST['pass2']){
   echo "As senhas não coencidem";
}elseif(isset($_POST['pass']) && !empty($_POST['pass'])){
   $conf->update("users", array("pass"=>md5($_POST['pass'])), array("id"=>$_SESSION['id']));
}
$_SESSION = array();
header('Location: DGP.php');
exit;