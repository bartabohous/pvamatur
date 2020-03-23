<?php 

require_once 'jadro/init.php';

if(prihlasen() === TRUE) {
	header('location: prispevky.php');
}

?>


<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">

    <title>web</title>
</head>
<body>

<a href="prihlaseni.php">přihlásit</a>  <a href="registrace.php">Registrovat</a>
</body>
</html>
