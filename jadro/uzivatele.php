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

function jizexistujejmeno($jmeno) {
	
	global $spojeni;

	$dotaz = "SELECT * FROM uzivatele WHERE jmeno = '$jmeno'";
	$query = $spojeni->query($dotaz);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$spojeni->close();
	
}
function jizexistujeemail($email) {
	
	global $spojeni;

	$dotaz = "SELECT * FROM uzivatele WHERE email = '$email'";
	$query = $spojeni->query($dotaz);
	if($query->num_rows >= 1) {
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
	$email = $_POST['email'];
	
	
	$nheslo = hashheslo($heslo);
	if($nheslo) {
		$dotaz = "INSERT INTO uzivatele (jmeno, prijmeni, heslo,email) VALUES ('$jmeno', '$prijmeni', '$nheslo', '$email')";
		$query = $spojeni->query($dotaz);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} 

	$spojeni->close();
	
} 
function novapoznamka(){
	global $spojeni;
	$telo = $_POST['telo'];
	$nadpis = $_POST['nadpis'];
	$idvlastnika = $_SESSION['id'];
	


	
	$dotaz = "INSERT INTO poznamky (nadpis, idvlastnika,telo) VALUES ('$nadpis', '$idvlastnika','$telo')";
	$query = $spojeni->query($dotaz);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
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

	$dotaz = "SELECT * FROM uzivatele WHERE id = '$id'";
	$query = $spojeni->query($dotaz);
	$vysledek = $query->fetch_assoc();
	return $vysledek;

	$spojeni->close();
}
function poznatprispevekpodleID($id){
global $spojeni;
$dotaz ="SELECT * FROM poznamky WHERE idvlastnika = '$id'";
$query = $spojeni->query($dotaz);
	$vysledek = $query->fetch_all(MYSQLI_ASSOC);
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
function existujepodleID($id, $jmeno,$email) {
	global $spojeni;

	$dotaz = "SELECT * FROM uzivatele WHERE( jmeno = '$jmeno' OR email = '$email') AND id != $id";
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
	$email = $_POST['email'];
	

	$dotaz = "UPDATE uzivatele SET jmeno = '$jmeno', prijmeni = '$prijmeni', email = '$email' WHERE id = $id";
	$query = $spojeni->query($dotaz);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function porovnanihesla($id, $heslo) {
    global $spojeni;
 
    $udaje = poznatpodleID($id);
 
    $hashheslo = hashheslo($heslo);
 
    if($hashheslo == $udaje['heslo']) {
        return true;
    } else {
        return false;
    }
 
    
    $spojeni->close();
}
 
function zmenahesla($id, $heslo) {
    global $spojeni;
 
    
    $hashheslo = hashheslo($heslo);
 
    $dotaz = "UPDATE uzivatele SET heslo = '$hashheslo' WHERE id = $id";
    $query = $spojeni->query($dotaz);
 
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}
function oznacitflag($id,$flago){
	global $spojeni;
$flag = $flago *(-1);
	$dotaz = "UPDATE poznamky SET flag ='$flag' WHERE id = $id";
	$query = $spojeni->query($dotaz);

}
function smazatprispevek($id){
	global $spojeni;
	$dotaz = "DELETE FROM poznamky WHERE id ='$id'";
	$query = $spojeni->query($dotaz);
}
function smazatucet($id){
	global $spojeni;
	$dotaz =  "DELETE FROM uzivatele WHERE id ='$id'";
	$dotaz2 =  "DELETE FROM poznamky WHERE idvlastnika ='$id'";
	$spojeni->query($dotaz);
	$spojeni->query($dotaz2);
}