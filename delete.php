<?php
session_start();
require "config.php";
$conf = new Conf();
$conf->delete("users", array("id"=>$_SESSION['id']));
$_SESSION = array();
header("Location: DGP.php");
exit;
?>