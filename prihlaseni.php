<?php
//konfigurační soubor s přihlášením na local databazi
require_once "config.php";
//získam z url udaje co vyplnil uživatel

$jmeno = $_POST['jmeno'];
$heslo = $_POST['heslo'];
//navazuji spojeni s databízí
$spojeni = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

//kontrola spojení
if (!$spojeni) {
    die("Spojení nenavázáno: " . mysqli_connect_error());
}

$dotaz ="SELECT heslo FROM uzivatele WHERE jmeno='$jmeno'";
$odpoved = mysqli_query($spojeni,$dotaz);


if($odpoved != hash('ripemd160',$heslo))
{
echo("kokote");
}
elseif ($odpoved==$heslo) {
    echo("typecek");
    }
