<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
$_SESSION = array();
header("location: DGP.php");
exit;
}