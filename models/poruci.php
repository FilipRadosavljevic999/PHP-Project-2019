<?php

ob_start();
session_start();
include("konekcija.php");
$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$adresa=$_POST['adresa'];
$broj=$_POST['broj'];

$id=$_GET['id'];
$idkorisnik=$_SESSION['korisnik']['idkorisnik'];
$vremeunosa=date("Y-d-m",time());
$upit=$konekcija->prepare("INSERT INTO porudzbina VALUES(NULL,:idartikl,:idkorisnik,:ime,:prezime,:adresa,:broj,:datum,1)");
$upit->bindParam(":idartikl",$id);
$upit->bindParam(":idkorisnik",$idkorisnik);
$upit->bindParam(":ime",$ime);
$upit->bindParam(":prezime",$prezime);
$upit->bindParam(":adresa",$adresa);
$upit->bindParam(":broj",$broj);
$upit->bindParam(":datum",$vremeunosa);
$upit->execute();
header("Location:../index.php?page=prodavnica");