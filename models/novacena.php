<?php 
ob_start();
$cena=$_POST['cena'];
$artikl=$_GET['id'];
include("konekcija.php");



$vremepromene=date("Y-d-m",time());

$upit=$konekcija->prepare("UPDATE cenovnik SET aktivna = 0,datumdo=:vreme WHERE idartikl=:artikl");
$upit->bindParam(":vreme",$vremepromene);
$upit->bindParam(":artikl",$artikl);
$upit->execute();
$upit=$konekcija->prepare("INSERT INTO cenovnik VALUES (NULL,:cena,:vreme,NULL,1,:id)");
$upit->bindParam(":cena",$cena);
$upit->bindParam(":vreme",$vremepromene);
$upit->bindParam(":id",$artikl);
$upit->execute();
header('Location:../index.php');



//INSERT INTO `cenovnik` (`idcena`, `cena`, `datumod`, `datumdo`, `aktivna`, `idartikl`) VALUES (NULL, '2000', '2020-06-16', NULL, '1', '3')