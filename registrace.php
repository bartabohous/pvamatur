<?php 

require_once 'jadro/init.php';

if(prihlasen() === TRUE) {
	header('location: prispevky.php');
}


if($_POST) {

	$jmeno = $_POST['jmeno'];
	$prijmeni = $_POST['prijmeni'];
	$email = $_POST['email'];
	$heslo = $_POST['heslo'];
	$overheslo = $_POST['overheslo'];

	if($jmeno == "") {
		echo " * nevyplnil jsi jmeno <br />";
	}

	if($prijmeni == "") {
		echo " * nevyplnil jsi přijmení <br />";
	}
	if($email == "") {
		echo " * nevyplnil jsi email <br />";
	}
	

	if($heslo == "") {
		echo " * nevyplnil jsi heslo <br />";
	}

	if($overheslo == "") {
		echo " * nevyplnil jsi ověření hesla <br />";
	}

	if($jmeno && $prijmeni &&  $heslo && $overheslo && $email) {

		if($heslo == $overheslo) {
			if(jizexistuje($jmeno) === TRUE) {
				echo $_POST['jmeno'] . " jméno již existuje !!";
			} else {
				if(registrovat() === TRUE) {
					echo "úspěšně zaregistrován <a href='prihlaseni.php'>přihlaš se</a>";
				} else {
					echo "Error";
				}
			}
		} else {
			echo " * neschodují se ti hesla <br />";
		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<div>
		<label for="jmeno">Jméno: </label>
		<input type="text" name="jmeno" placeholder="napiš jméno" autocomplete="off" value="<?php if($_POST) {
			echo $_POST['jmeno'];
			} ?>" />
	</div>
	<br />

	<div>
		<label for="prijmeni">Přijmení: </label>
		<input type="text" name="prijmeni" placeholder="Přijmení" autocomplete="off" value="<?php if($_POST) {
			echo $_POST['prijmeni'];
			} ?>" />
	</div>
	<br />
	<div>
		<label for="email">Email: </label>
		<input type="text" name="email" placeholder="email" autocomplete="off" />
	</div>
	<br />

	<div>
		<label for="heslo">Heslo: </label>
		<input type="password" name="heslo" placeholder="Password" autocomplete="off" />
	</div>
	<br />

	<div>
		<label for="overheslo">Ověření hesla: </label>
		<input type="password" name="overheslo" placeholder="Ověř heslo" autocomplete="off" />
	</div>
	<br />
	<div>
		<button type="submit">registruj</button>
		<button type="reset">Cancel</button>
	</div>

</form>

již zaregistrovan? <a href="prihlaseni.php">přihlaš se</a> 

</body>
</html>