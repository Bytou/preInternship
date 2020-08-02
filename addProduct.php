<?php 
session_start();
//récupérer l'ID du produit ajouter en GET, regarder s'il n'existe pas dans la session, l'ajouter à la variable Session['product']
$exist= false;
if (isset($_SESSION['products'])) {
	foreach ($_SESSION['products'] as $product) {
		if ((int)$product == (int)$_GET['id']){
			header('Location: index.php?nop=1');
			$exist=true;
		}
	}
	if ($exist == false) {
		array_push($_SESSION['products'], $_GET['id']);
	} 
	header('Location: index.php');


} else {
	echo 'Nop [TODO] : retour avec l\'info "connexion obligatoire"';
}

?>