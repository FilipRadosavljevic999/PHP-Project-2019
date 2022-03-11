<?php
ob_start();
session_start();
    $allowedTypes = [
    "image/jpeg",
    "image/jpg",
    "image/png"
];
$greske = [];


/*if(!isset($_POST["dugmeartikl"])) {
    header("Location:404php");
}*/
   if(!in_array($_FILES["slike"]["type"], $allowedTypes)) {
       $greske[] = "Tip fajla nije podrzan.";
   }

   if($_FILES["slike"]["size"] > 2000000) {
       $greske[] = "Maksimalna velicina fajla je 2mb.";
   }
   if(!isset($_POST['imeartikla'])){
       $greske[]="ime nije setovano";
   }
   if(!isset($_POST['cena'])){
    $greske[]="Cena nije setovana";
   }
    $ime=$_POST['imeartikla'];
    $cena=(int)$_POST['cena'];
    $vrste=$_POST['vrste'];
    $pol=$_POST['pol'];
    $precnik=$_POST['precnik'];
    $narukvica=$_POST['narukvica'];
    $mehanizam=$_POST['mehanizam'];
    $vodootpornost=$_POST['otpornost'];
    $kolicina=$_POST['kolicina'];
    //var_dump($mehanizam);
    $tekst='/[A-Za-z0-9\-Žćčšđž]{4,}(\s[A-Za-z0-9\-Žćčšđž]{4,}){0,}/';
    $cenareg='/[0-9]{1,15}/';
    if(!preg_match($tekst,$ime)){
        $greske[]="Ime je u pogresnom formatu";
    }
    if(!preg_match($tekst,$vodootpornost)){
        $greske[]="Vodootpornost je u pogresnoa,npr:50 metara";
    }
    if(!preg_match($cenareg,$kolicina)){
        $greske[]="Kolicina mora sadrzati samo brojeve";
    }
   
    
    $fileName = time() . "_" . $_FILES["slike"]["name"];
    $putanja = "../img/" . $fileName;
    move_uploaded_file($_FILES["slike"]["tmp_name"], $putanja);
    include("konekcija.php");
    if(count($greske)==0){
    $upit=$konekcija->prepare("INSERT INTO artikl VALUES (NULL,:naziv,:vecaslika,:kolicina,:otpornost,:narukvica,:mehaniza,:pol,:precnik,:vrsta)");
    $upit->bindParam(":naziv",$ime);
    $upit->bindParam(":vecaslika",$fileName);
    
    $upit->bindParam(":kolicina",$kolicina);
    $upit->bindParam(":otpornost",$vodootpornost);
    $upit->bindParam(":narukvica",$narukvica);
    $upit->bindParam(":mehaniza",$mehanizam);
    $upit->bindParam(":pol",$pol);
    $upit->bindParam(":precnik",$precnik);
    $upit->bindParam(":vrsta",$vrste);
    $upit->execute();
    $stmt = $konekcija->query("SELECT LAST_INSERT_ID()");
    $lastId = $stmt->fetchColumn();
    //var_dump($lastId);
    $vremeunosa=date("Y-d-m",time());
    $upitcena=$konekcija->prepare("INSERT INTO cenovnik VALUES(NULL,:cena,:datum,NULL,1,:idartikl)");
    $upitcena->bindParam(":cena",$cena);
    $upitcena->bindParam(":datum",$vremeunosa);
    $upitcena->bindParam(":idartikl",$lastId);
    //INSERT INTO `cenovnik` (`idcena`, `cena`, `datumod`, `datumdo`, `aktivna`, `idartikl`) VALUES (NULL, '200', '2020-06-03', NULL, '1', '3')
    
    $upitcena->execute();
    $_SESSION['uspeoUnos']="Uneli ste artikl";
    header("Location:../admin.php");
   
    }
    else{
        $_SESSION['greskaunos']=$greske;
        header("Location:../admin.php");
    }