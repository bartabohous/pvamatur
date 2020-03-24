<?php 
 
require_once 'jadro/init.php'; 
 
if(neprihlasen() === TRUE) {
    header('location: prihlaseni.php');
}
 
$udaje = poznatpodleID($_SESSION['id']);
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
</head>
<body>
 
<h1>uživatelské udaje</h1>
 
<table border="1" style="width:100%;">
    <tr>
        <th>Jméno </th>
        <td><?php echo $udaje['jmeno'] ?></td>
    </tr>
    <tr>
        <th>Přijmení</th>
        <td><?php echo $udaje['prijmeni'] ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $udaje['email'] ?></td>
    </tr>
    
    
 
<br />
 
<a href="prispevky.php"><button type="button">zpět</button></a>
 
</body>
</html>