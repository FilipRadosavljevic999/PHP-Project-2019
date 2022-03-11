<?php
ob_start();
session_start();
if(!isset($_SESSION['korisnika']) && $_SESSION['korisnik']['nazivuloge']!="admin" && !isset($_GET['id'])){
    header('Location:404.php');
}
$id=$_GET['id'];
include('konekcija.php');
//UPDATE `poruke` SET `Deleted` = '1' WHERE `poruke`.`idPoruke` = 1
$upit=$konekcija->prepare('UPDATE poruke SET Deleted=0 WHERE idPoruke=:id');
$upit->bindParam(':id',$id);
$upit->execute();
header('Location:../admin.php');