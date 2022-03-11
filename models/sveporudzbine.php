<?php
include('konekcija.php');
$odgovor=$konekcija->query("SELECT p.idporudzbina,p.ime,p.prezime,p.adresa,p.brojtelefona,a.naziv,k.email FROM (porudzbina AS p INNER JOIN artikl AS a ON p.idartikl=a.idartikl)INNER JOIN korisnici AS k ON p.idkorisnik=k.idkorisnik WHERE p.Deleted=1")->fetchall();
header('Content-Type:application/json');
echo json_encode($odgovor);