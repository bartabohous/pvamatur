<?php 

require_once 'jadro/init.php';

if(prihlasen() === TRUE) {
	header('location: prispevky.php');
}


if($_POST) {
	$jmeno = $_POST['jmeno'];
	$heslo = $_POST['heslo'];

	if($jmeno == "") {
		echo " * nevyplnil jsi jméno <br />";
	}

	if($heslo == "") {
		echo " * nevyplnil jsi heslo <br />";
	}

	if($jmeno && $heslo) {
		if(jizexistujejmeno($jmeno) == TRUE) {
			$prihlaseni = prihlaseni($jmeno, $heslo);
			if($prihlaseni) {
				$udaje = udaje($jmeno);

				$_SESSION['id'] = $udaje['id'];

				header('location: prispevky.php');
				exit();
					
			} else {
				echo "nesprávné udaje";
			}
		} else{
			echo "uživatel neexistuje";
		}
	}

} 


?>


<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
	<title>přihlášení</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label for="jmeno">jméno</label>
		<input type="text" name="jmeno" id="jmeno" autocomplete="off" placeholder="přihlašovací jméno" />
	</div>
	<br />

	<div>
		<label for="heslo">heslo</label>
		<input type="password" name="heslo" id="heslo" autocomplete="off" placeholder="Heslo" />
	</div>
	<br />

	<div>
		<button type="submit">přihlásit</button>
		<button type="reset">Cancel</button>
	</div>
	
</form>

nemáš účet? <a href="registrace.php">Registruj</a> 

</body>
</html>