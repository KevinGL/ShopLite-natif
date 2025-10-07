<?php
session_start();

require_once("header.php");

if(!isset($_SESSION["user"]))
{
    header("Location: index.php");
}

?>

LISTE DES PRODUITS