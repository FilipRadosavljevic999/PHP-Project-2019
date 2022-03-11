<?php 
ob_start();
session_start();
if(!isset($_POST['logindugme'])){
    header('Location:404.php');
}

include('konekcija.php');
$greske=[];
$email=$_POST['email'];
$pass=$_POST['sifra'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $greske[] = "Email je u ne ispravnom formatu";
}
$RegPass="/^[A-Za-z0-9]{3,}$/";
if(!preg_match($RegPass,$pass)){
    $greske[]="Pasword je pogresan,mora imati vise od 3 karaktera";
}

if(count($greske)==0){
    //SELECT k.email,u.uloga FROM korisnici AS k INNER JOIN uloga AS u ON k.iduloga=u.id
    $upit=$konekcija->prepare("SELECT k.idkorisnik,k.email,u.uloga AS nazivuloge FROM korisnici AS k INNER JOIN uloga AS u ON k.iduloga=u.id WHERE k.email=:email && k.sifra=:pass && k.aktivan=1");
    $pass=md5($pass);
    $upit->bindParam(":email",$email);
    $upit->bindParam(":pass",$pass);
    $upit->execute();
    if($upit->rowcount()==1){
        $korisnik=$upit->fetch();
        $_SESSION['korisnik']=$korisnik;
        //var_dump($_SESSION['korisnik']);
        header('Location:../index.php?');
    }
    else{
       $_SESSION["greskalogin"]="Email ne postoji ili je sifra pogresna";
       header('Location:../register.php');
}
}
else{
    $_SESSION['greskalogovanje']=$greske;
    header('Location:../register.php');
    
}