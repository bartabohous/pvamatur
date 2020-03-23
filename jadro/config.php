<?php
    $dbhost = '127.0.0.1';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'web';

    $spojeni = new Mysqli($dbhost, $dbusername, $dbpassword, $dbname);

    if (!$spojeni) {
        die("Spojení nenavázáno: " . mysqli_connect_error());
    }
    
    ?>
