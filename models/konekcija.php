<?php

$konekcija = new PDO("mysql:host=localhost;dbname=php1", "root", "");
        

$konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);