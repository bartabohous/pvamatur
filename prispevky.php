<?php require_once 'jadro/init.php'; 

if(neprihlasen() === TRUE) {
	header('location: prihlaseni.php');
}

$udaje = poznatpodleID($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>příspěvky</title>
</head>
<body>

<ul>
	<li>ahoj , <?php echo $udaje['jmeno']; ?></li>
	<li><a href="profil.php">Profil</a></li>
	<li><a href="nastaveni.php">Nastavení</a></li>
	<li><a href="zmenahesla.php">změna hesla</a></li>
	<li><a href="odhlasit.php">odklásit</a></li>
</ul>


</body>
</html>