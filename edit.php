<?php
session_start();
try {
    $db = "mysql:dbname=DGP;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO ($db, $dbuser, $dbpass);
    if (isset($_POST['name']) && empty($_POST['name'])){
        echo "Preencha seu nome";
    }elseif (isset($_POST['lastname']) && empty($_POST['lastname'])){
        echo "Preencha seu sobrenome";
    }elseif (isset($_POST['email']) && !empty($_POST['email'])){
        $id = $_SESSION['id'];
        $name = addslashes($_POST['name']);
        $lastname = addslashes($_POST['lastname']);
        $email = addslashes($_POST['email']);
        $sql = "UPDATE users SET email = '$email', name = '$name', lastname = '$lastname' WHERE id = '$id'";
        $sql = $pdo->query($sql);
    }
    if($_POST['pass'] != $_POST['pass2']){
        echo "As senhas não coencidem";
    }elseif(isset($_POST['pass']) && !empty($_POST['pass'])){
        $id = $_SESSION['id'];
        $pass = md5($_POST['pass']);
        $sql = "UPDATE users SET pass = '$pass' WHERE id = '$id'";
        $sql = $pdo->query($sql);
    }
}catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
$_SESSION = array();
header('Location: DGP.php');
exit;
?>