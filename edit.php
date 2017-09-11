<?php
session_start();
$email = addslashes($_POST['email']);
$pass = md5(addslashes($_POST['pass']));
$pass2 = md5(addslashes($_POST['pass2']));
$name = addslashes($_POST['name']);
$lastname = addslashes($_POST['lastname']);
$id = $_SESSION['id'];
try {
    $db = "mysql:dbname=DGP;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO ($db, $dbuser, $dbpass);
    if (isset($name) && empty($name)){
        echo "Preencha seu nome";
    }elseif (isset($lastname) && empty($lastname)){
        echo "Preencha seu sobrenome";
    }elseif (isset($email) && !empty($email)){
        $name = addslashes($name);
        $lastname = addslashes($lastname);
        $email = addslashes($email);
        $sql = "UPDATE users SET email = '$email', name = '$name', lastname = '$lastname' WHERE id = '$id'";
        $sql = $pdo->query($sql);
    }else{
        echo "Falha ao criar conta";
    }if($pass != $pass2){
        echo "As senhas não coencidem";
    }elseif(isset($pass) && !empty($pass)){
        $sql = "UPDATE users SET pass = '$pass' WHERE id = '$id'";
        $sql = $pdo->query($sql);
    }else{
        echo "Algo deu errado";
    }
}catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
$_SESSION = array();
header('Location: DGP.php');
exit;
?>
