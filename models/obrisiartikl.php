<?php
ob_start();
session_start();
if(!isset($_GET['id']) && $_SESSION['korisnik']['nazivuloge']!="admin" && !isset($_SESSION['korisnik'])){
    header('Location:404.php');
}
$id=$_GET['id'];
include('konekcija.php');
//UPDATE `artikl` SET `kolicina` = '0' WHERE `artikl`.`idartikl` = 1
$upit=$konekcija->prepare('UPDATE artikl SET kolicina=0 WHERE idartikl=:id');
$upit->bindParam(':id',$id);
$upit->execute();
header('Location:../index.php');