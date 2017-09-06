<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
header('Location: DGP.php');
exit;
}else{header("Location: index.php");}
?>