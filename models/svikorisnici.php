<?php
include("konekcija.php");
$odgovor=$konekcija->query("SELECT idkorisnik,ime,prezime,email FROM korisnici WHERE aktivan=1")->fetchall();
header('Content-Type:application/json');
echo json_encode($odgovor);