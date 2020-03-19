<?php
//funkce na vyhazovani chyb
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
//konfigurační soubor s přihlášením na local databazi
require_once "config.php";
//získam z url udaje co vyplnil uživatel
$jmeno = $_POST['jmeno'];
$prijmeni = $_POST['prijmeni'];
$heslo = $_POST['heslo'];
$overheslo = $_POST['overheslo'];
if ($heslo!=$overheslo) {
    header('location:registrace.html');
   //chybi alert
    exit;
}
$hashheslo = hash('ripemd160',$heslo);

//navazuji spojeni s databízí
$spojeni = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);
//kontrola spojení
if (!$spojeni) {
    die("Spojení nenavázáno: " . mysqli_connect_error());
}

$dotaz ="INSERT INTO uzivatele (jmeno,prijmeni,heslo) VALUES ($jmeno,$prijmeni,$hashheslo)";
mysqli_query($spojeni,$dotaz);
$odpoved = mysqli_query($spojeni,$dotaz);
if ($odpoved== true) {
    //hlaska s uspesnou registraci
    header('location:index.html');
}
else {
//hlaska ze nespela registrace
alert("chyba databaze");
header('location:registrace.html');
}
die();