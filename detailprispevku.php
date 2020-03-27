<?php
require_once 'jadro/init.php'; 
 
if(neprihlasen() === TRUE) {
    header('location: prihlaseni.php');
}
$nadpis = $_SESSION["nadpis"];
$cas = $_SESSION["casvytvoreni"];
$telo = $_SESSION["telo"];

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">

    <title>detail</title>
</head>
<body>
<a href="prispevky.php"><button type="button">zpět</button></a>
<h1><?=$nadpis?></h1>
<h5><?=$cas?></h5>
<br>
<p><?=$telo?></p>

</body>
</html>