<?php


function prihlasen() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}
function neprihlasen() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function jizexistuje($jmeno) {
	
	global $spojeni;

	$dotaz = "SELECT * FROM uzivatele WHERE jmeno = '$jmeno'";
	$query = $spojeni->query($dotaz);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$spojeni->close();
	
}

function registrovat() {

	global $spojeni;

	$jmeno = $_POST['jmeno'];
	$prijmeni = $_POST['prijmeni'];
	$heslo = $_POST['heslo'];
	
	
	$nheslo = hashheslo($heslo);
	if($nheslo) {
		$dotaz = "INSERT INTO uzivatele (jmeno, prijmeni, heslo) VALUES ('$jmeno', '$prijmeni', '$nheslo')";
		$query = $spojeni->query($dotaz);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} 

	$spojeni->close();
	
} 

function hashheslo($heslo) {
	return hash('sha256', $heslo);
}
function prihlaseni($jmeno, $heslo) {
    global $spojeni;
    $udaje = udaje($jmeno);
 
    if($udaje) {
        $hashheslo = hashheslo($heslo);
        $dotaz = "SELECT * FROM uzivatele WHERE jmeno = '$jmeno' AND heslo = '$hashheslo'";
        $query = $spojeni->query($dotaz);
 
        if($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
 
    $spojeni->close();
   
}
 
function udaje($jmeno) {
    global $spojeni;
    $dotaz = "SELECT * FROM uzivatele WHERE jmeno = '$jmeno'";
    $query = $spojeni->query($dotaz);
    $odpoved = $query->fetch_assoc();
    if($query->num_rows == 1) {
        return $odpoved;
    } else {
        return false;
    }
     
    $spojeni->close();
 
    
}
function poznatpodleID($id) {
	global $spojeni;

	$dotaz = "SELECT * FROM uzivatele WHERE id = $id";
	$query = $spojeni->query($dotaz);
	$vysledek = $query->fetch_assoc();
	return $vysledek;

	$spojeni->close();
}
function odhlasit() {
	if(prihlasen() === TRUE){
		
		session_unset();

		
		session_destroy();

		header('location: prihlaseni.php');
	}
}
function existujepodleID($id, $jmeno) {
	global $spojeni;

	$dotaz = "SELECT * FROM uzivatele WHERE jmeno = '$jmeno' AND id != $id";
	$query = $spojeni->query($dotaz);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$spojeni->close();
}
function aktualizovatinfo($id) {
	global $spojeni;

	$jmeno = $_POST['jmeno'];
	$prijmeni = $_POST['prijmeni'];
	

	$dotaz = "UPDATE uzivatele SET jmeno = '$jmeno', prijmeni = '$prijmeni' WHERE id = $id";
	$query = $spojeni->query($dotaz);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}