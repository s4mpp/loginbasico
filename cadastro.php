<?php
session_start();
if (isset($_POST['name']) && empty($_POST['name'])){
    echo "Preencha seu nome";
}elseif (isset($_POST['lastname']) && empty($_POST['lastname'])){
    echo "Preencha seu sobrenome";
}elseif ($_POST['pass'] != $_POST['pass2']){
    echo "As senhas não coensidem";
}elseif (isset($_POST['email']) && !empty($_POST['email'])){
    require "config.php";
    $conf = new Conf();
    $conf->insert("users", array("email"=>$_POST['email'],"pass"=>md5($_POST['pass']),"name"=>$_POST['name'],"lastname"=>$_POST['lastname']));
    header('Location: index.php');
    exit;
}else{
    echo "Falha ao criar conta";
}