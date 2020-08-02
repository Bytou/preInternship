<?php 
session_start();
$_SESSION['tryConnection']=true;


try {
	$bdd = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'root');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
try {
	$req = $bdd->query('SELECT COUNT(*) FROM user WHERE Email=\'' . $_POST['mail'] . '\'');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}


if (($req->fetch())[0]==0){
	header('Location: signin.php');
} else {
	try {
		$req = $bdd->query('SELECT * FROM user WHERE Email=\'' . $_POST['mail'] . '\'');
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	$a = $req->fetch();
	if ($a['Password']==$_POST['mdp']){
		$_SESSION['name']=''.$a['Firstname'] .' '. $a['Lastname'];
		$_SESSION['idUser'] = $a['Id'];
		$_SESSION['products'] = array();
		header('Location: index.php');
	} else {
		$_SESSION['tryConnection']=false;
		$_SESSION['tryPassword']=true;
		header('Location: signin.php');
	}
}
?>