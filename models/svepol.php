<?php
include("konekcija.php");
$odgovor=$konekcija->query("SELECT * FROM pol")->fetchall();
$code=200;
http_response_code($code);
header('Content-Type:application/json');
echo json_encode($odgovor);