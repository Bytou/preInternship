<?php 
try {
	$bdd = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'root');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

try {
	$products = $bdd->query('SELECT * FROM product');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Market Place</title>
	<meta charset="utf-8">
</head>

<body>
	<?php include 'includes/navbar.php'; ?>

	<?php  
		while ($product = $products->fetch()) {
			echo ''.$product['Label'] . 'au prix de ' . $product['Price'] . ' € <button onclick="addList('.$product['Id'].')">Ajouter à la commande </button> <br> <br>';

		}
	?>

	<hr>
	<?php 
	$_SESSION['tryConnection']=false;
	$_SESSION['tryPassword']=false;
	?>

	<script type="text/javascript" src="index.js"></script>
</body>
</html>

