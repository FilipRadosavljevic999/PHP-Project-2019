<?php
ob_start();
session_start();
if(!isset($_POST['posali'])){
    header('Location:404.php');
}
$regexporuka = "/^.{1,50}(\s.{1,50}){1,}$/";
$greske=[];
$poruka=$_POST['poruka'];
if(!preg_match($regexporuka, $poruka)){
    $greske[] = "Poruka nije u dobrom formatu";
    
};
$idkorisnik=$_SESSION['korisnik']['idkorisnik'];
include('konekcija.php');
if(count($greske)==0){
$upit=$konekcija->prepare('INSERT INTO poruke VALUES(NULL,:idkorisnik,:idporuka,1)');
$upit->bindParam('idkorisnik',$idkorisnik);
$upit->bindParam('idporuka',$poruka);
$upit->execute();
$_SESSION['porukauspelo']="Poruka je poslata";
header('Location:../contact.php');
}
else{
    $_SESSION['greskeporuka']=$greske;
    header('Location:../contact.php');
}