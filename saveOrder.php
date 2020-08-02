<?php 
session_start();

if (isset($_GET['drive'])&&($_GET['drive']=='on')){
	$drive = true;
} else {
	$drive = false;
}

//Faire la requete pour enregistrer la commande, puis celles pour la liaison commande/produit
try {
	$bdd = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'root');
} catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}

try {
	$ins = $bdd->prepare('INSERT INTO orders(Address, Drive, IdUser, TotalPrice) VALUES (:addr, :drive, :idUser, :totPrice)');
	$ins->execute(array(
		'addr'=>$_GET['addr'],
		'drive'=>$drive,
		'idUser'=>$_SESSION['idUser'],
		'totPrice'=>$_SESSION['orderPrice']
	));
	$lv = $bdd->lastInsertId();
} catch (Exception $e){
	die('Erreur lors de la sauvegarde : '.$e->getMessage());
}

$ins = $bdd->prepare('INSERT INTO order_list(IdOrder, IdProduct) VALUES (:idOrder, :idProduct)');
foreach ($_SESSION['products'] as $id) {
	try {
		$ins->execute(array(
			'idOrder'=>$lv,
			'idProduct'=>$id
		));
	} catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
}


//redirection à la page Historique

?>