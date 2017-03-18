<?php 
session_start();
$_SESSION["userid"]="";
$_SESSION["passwd"]="";
header("Location: index.php");
?>