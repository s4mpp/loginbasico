<?php
session_start();
try {
    $id = $_SESSION['id'];
    $db = "mysql:dbname=DGP;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO ($db, $dbuser, $dbpass);
    $sql = "DELETE FROM users WHERE id = '$id'";
    $sql = $pdo->query($sql);
    $_SESSION = array();
    header("Location: DGP.php");
    exit;
}catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}
?>