<?php
//SELECT k.email,p.Poruka FROM poruke AS p INNER JOIN korisnici as k ON p.idKorisnik=k.idkorisnik
include("konekcija.php");
$odgovor=$konekcija->query("SELECT k.email,p.Poruka,p.idPoruke FROM poruke AS p INNER JOIN korisnici as k ON p.idKorisnik=k.idkorisnik WHERE Deleted=1")->fetchall();
header('Content-Type:application/json'); 
echo json_encode($odgovor);