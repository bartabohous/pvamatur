<?php require_once 'jadro/init.php'; 
 
if(neprihlasen() === TRUE) {
    header('location: prihlasit.php');
}

if($_POST){
    $nadpis = $_POST['nadpis'];
    $telo = $_POST['telo'];
   
    
    if($nadpis == "") {
		echo " * nevyplnil nadpis <br />";
	}

	if($telo == "") {
		echo " * nevyplnil jsi tělo příspěvku <br />";
	}

    if($nadpis && $telo){
    if(novapoznamka()===TRUE){
        echo "uspěšně jsi udělal poznámku";
    }
        else {
        echo"chybka";
        }

    }
}



?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>nastavení</title>
  
</head>
<body>
<a href="prispevky.php"><button type="button">zpět</button></a>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<div>
    <label for="nadpis">Nadpis</label>
    <input type="text" name="nadpis" maxlength="50" id="nadpis" placeholder="Nadpis">
</div>
<br>

<div>
    <label for="telo">Tělo</label>
    <input type="text" name="telo" id="telo" maxlength="255"  placeholder="napiš příspěvek">
</div>
<br>
<div>
        <button type="submit">Odeslat</button>       
    </div>
</form>

    
</body>
</html>