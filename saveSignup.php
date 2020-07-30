<?php 
session_start();
$err = false;
try {
	$bdd = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'root');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}



try {
	$req = $bdd->prepare('INSERT INTO user(Firstname, Lastname, Email, Password) VALUES (:first, :last, :mail, :mdp)');
	$req->execute(array(
		'first'=>$_POST['first'],
		'last'=> $_POST['last'],
		'mail'=>$_POST['mail'],
		'mdp'=>$_POST['mdp']
	));
	$_SESSION['name']=''.$_POST['first'] .' '. $_POST['last'];
	header('Location: index.php');

} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	header('Location: signup.php');
} 

?>



