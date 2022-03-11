<?php
ob_start();
session_start();
$greske=[];
$dugme=$_POST["registerdugme"];
if(!isset($dugme)){
    header('Location:404.php');
};
if(!isset($_POST['ime'])){
    $greske[]="Morate uneti ime";
}
if(!isset($_POST['prezime'])){
    $greske[]="Morate uneti prezime";
}
if(!isset($_POST['emailreg'])){
    $greske[]="Morate uneti email";
}
if(!isset($_POST['password'])){
    $greske[]="Morate uneti lozinku";
}
if(!isset($_POST['potvrda'])){
    $greske[]="Morate uneti potvrdu lozinke";
}
$ime=$_POST["ime"];
$Prezime=$_POST["prezime"];
$email=$_POST["emailreg"];
$pass=$_POST["password"];
$passconfirm=$_POST["potvrda"];

$regexIme = "/^[A-ZČĆŠĐŽ][a-zčćšđž]{1,14}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{1,19}){0,}$/";
$regexLozinka = "/^.{4,50}$/";
define("ULOGA",2);
if(!preg_match($regexIme, $ime)){
    $greske[] = "Ime nije u dobrom formatu mora sadrzati minimu 4 karaktera bez specijalnih znakova";
    
};
if(!preg_match($regexIme, $Prezime)){
    $greske[] = "Prezime nije u dobrom formatu";
};
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $greske[] = "Email nije u dobrom formatu";
};
if($pass!=$passconfirm){
    $greske[]="Lozinke se ne podudaraju";
};
if(!preg_match($regexLozinka, $pass)){
    $greske[] = "Lozinka nije u dobrom formatu";
}
include("konekcija.php");
if(count($greske)==0){
    $upit="INSERT INTO korisnici VALUES (NULL, :ime, :prezime, :email, :pass, 1,2 )";
    $pass=md5($pass);
    $upis=$konekcija->prepare($upit);
    $upis->bindParam(":ime",$ime);
    $upis->bindParam(":prezime",$Prezime);
    $upis->bindParam(":email",$email);
    $upis->bindParam(":pass",$pass);
    try{
    $uneto=$upis->execute();
    header("Location:../register.php");
    $_SESSION['uspelareg']="Uspešno ste se registrovali";
    }
    catch(PDOException $ex){
        $_SESSION['greskabaze']="Već postoji korisnik sa tim emailom";
        header('Location:../register.php');

    }
}
else{
    $_SESSION['greskereg']=$greske;
    header('Location:../register.php');
}