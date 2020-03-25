<?php require_once 'jadro/init.php'; 
 
if(neprihlasen() === TRUE) {
    header('location: prihlasit.php');
}
 
$udaje = poznatpodleID($_SESSION['id']);
 
 
if($_POST) {
    $jmeno = $_POST['jmeno'];
    $prijmeni = $_POST['prijmeni'];
    $email = $_POST['email'];
    
 
    if($jmeno == "") {
        echo " * nevyplnil jsi jmeno <br />";
    }
 
    if($prijmeni == "") {
        echo " * nevyplnil jsi přijmeni <br />";
    }
    if ($email== "") {
        echo "* nevyplnil jsi email<br/>";
    }
 
 
    if($jmeno && $prijmeni && $email) {
        $existuje = existujepodleID($_SESSION['id'], $jmeno,$email);
        if($existuje === TRUE) {
            echo "uživatelské jméno, nebo email je již zabrané <br /> ";
        } else {
            if(aktualizovatinfo($_SESSION['id']) === TRUE) {
                echo "uspěšně aktualizováno <br />";
                
            } else {
                echo "Error,něco je špatně";
            }
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
 
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div>
        <label for="jmeno">Jméno</label>
        <input type="text" name="jmeno" id="jmeno" placeholder="jmeno" value="<?php if($_POST) {
            echo $_POST['jmeno'];
            } else {
                echo $udaje['jmeno'];
                } ?>">
    </div>
    <br />
 
    <div>
        <label for="prijmeni">přijmení</label>
        <input type="text" name="prijmeni" id="prijmeni" placeholder="Přijmení" value="<?php if($_POST) {
            echo $_POST['prijmeni'];
            } else {
                echo $udaje['prijmeni'];
                } ?>">
    </div>
    <br />
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email" value="<?php if($_POST) {
            echo $_POST['email'];
            } else {
                echo $udaje['email'];
                } ?>">
    </div>
    <br />
 
    <div>
        <button type="submit">Odeslat</button>       
    </div>
 
</form>
 
<a href="prispevky.php"><button type="button">zpět</button></a>
 
</body>
</html>