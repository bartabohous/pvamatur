<?php require_once 'jadro/init.php'; 

if(neprihlasen() === TRUE) {
	header('location: prihlaseni.php');
}

$udaje = poznatpodleID($_SESSION['id']);

$prispevky = poznatprispevekpodleID($_SESSION['id']);

if(isset($_POST['detail'])) {
	$nadpis = $_POST['nadpis'];
	$telo = $_POST['telo'];
	$casvytvoreni = $_POST['casvytvoreni'];

	 $_SESSION["nadpis"] = "$nadpis";  
	 $_SESSION["telo"] = "$telo";  
	 $_SESSION["casvytvoreni"] = "$casvytvoreni";  
	
	header('location: detailprispevku.php');
}
if(isset($_POST['flaga'])) {
	$flag = $_POST['flag'];
	$id = $_POST['id'];
	oznacitflag($id,$flag);
	header('location: prispevky.php');
}
if(isset($_POST['smazat'])){
	$id = $_POST['id'];
smazatprispevek($id);
header('location: prispevky.php');
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
	<title>příspěvky</title>

<style>
#pravda {
  color: red;
}
.zmiz{
	display:none;
    visibility:hidden;
}

</style>
</head>
<body>

<ul>
	<li>ahoj, <?php echo $udaje['jmeno']; ?></li>
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
	<?php if($radek['flag']!=1):?>
	<td><h1 id="pravda"><?=$radek["nadpis"]?></h1></td>
	<?php endif; ?>

	<?php if($radek['flag']==1):?>
	<td><h1><?=$radek["nadpis"]?></h1></td>
	<?php endif; ?>

	<td><?=$radek["casvytvoreni"]?></td>
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
	<input class="zmiz" type="text" name="nadpis" value="<?=$radek['nadpis']?>"/>
	<input class="zmiz" type="text" name="telo" value="<?=$radek['telo']?>"/>
	<input class="zmiz" type="text" name="casvytvoreni" value="<?=$radek['casvytvoreni']?>"/>
	<td><input type="submit"  name="detail" value="detail"></td>
	</form>
	<td>

	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <input type="submit"  name="flaga" value="*">
	<input class="zmiz" type="text" name="id" value="<?=$radek["id"]?>"/>
	<input class="zmiz" type="text" name="flag" value="<?=$radek["flag"]?>"/>
	<input type="submit"  name="smazat" value="smazat">
	</form>
	</td>
    </tr>
			<?php endforeach; ?>
</table>





</body>
</html>