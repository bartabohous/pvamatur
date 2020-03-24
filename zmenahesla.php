<?php 
 
require_once 'jadro/init.php'; 
 
if(neprihlasen() === TRUE) {
    header('location: prihlaseni.php');
}
 
if($_POST) {
    $soucasneheslo = $_POST['soucasneheslo'];
    $noveheslo = $_POST['noveheslo'];
    $overheslo = $_POST['overheslo'];
 
    if($soucasneheslo == "") {
        echo "vyplň současné heslo <br />";
    }
 
    if($noveheslo == "") {
        echo "vyplň nové heslo <br />";
    }
 
    if($overheslo == "") {
        echo "vyplň ověření hesla <br />";
    }
 
    if($soucasneheslo && $noveheslo && $overheslo) {
        if(porovnanihesla($_SESSION['id'], $soucasneheslo) === TRUE) {
 
            if($noveheslo != $overheslo) {
                echo "nová hesla se nechodují <br />";
            } else {
                if(zmenahesla($_SESSION['id'], $noveheslo) === TRUE) {
                    echo "úspěšně změněno";
                } else {
                    echo "někde nastala chyba,zkus znovu <br />";
                }
            }
             
        } else {
            echo "stávající heslo se neschoduje <br />";
        }
    }
}
 
?>
 
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Změna hesla</title>
</head>
<body>
 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <table>
        <tr>
            <th>
                aktuální heslo
            </th>
            <td>
                <input type="password" name="soucasneheslo" autocomplete="off" placeholder="současné heslo" />
            </td>
        </tr>
        <tr>
            <th>
                 nové heslo
            </th>
            <td>
                <input type="password" name="noveheslo" autocomplete="off" placeholder="nové heslo" />
            </td>
        </tr>
        <tr>
            <th>
                 potvrzení hesla
            </th>
            <td>
                <input type="password" name="overheslo" autocomplete="off" placeholder=" potvrď heslo" />
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">změnit heslo</button>
            </td>
            <td>
                <a href="prispevky.php"><button type="button">zpět</button></a>
            </td>
        </tr>
    </table>
</form>
 
</body>
</html>