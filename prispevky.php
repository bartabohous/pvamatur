<?php require_once 'jadro/init.php'; 

if(neprihlasen() === TRUE) {
	header('location: prihlaseni.php');
}

$udaje = poznatpodleID($_SESSION['id']);

$prispevky = poznatprispevekpodleID($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
	<title>příspěvky</title>
</head>
<body>

<ul>
	<li>ahoj , <?php echo $udaje['jmeno']; ?></li>
	<li><a href="profil.php">Profil</a></li>
	<li><a href="nastaveni.php">Nastavení</a></li>
	<li><a href="zmenahesla.php">změna hesla</a></li>
	<li><a href="vytvorpoznamku.php">nová poznámka</a></li>
	<li><a href="odhlasit.php">odklásit</a></li>
	
</ul>
<br/>


<table>

<?php foreach($prispevky as $radek): ?>
	<tr>
	<td><h1><?=$radek["nadpis"]?></h1></td>
	<td><?=$radek["casvytvoreni"]?></td>
	<td><a href="detailprispevku.php">detail</a></td>
    </tr>
			<?php endforeach; ?>
</table>





</body>
</html>