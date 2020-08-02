<?php session_start();
try {
	$bdd = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'root');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

try {
	$products = $bdd->query('SELECT * FROM product WHERE Id IN (' . implode(',', array_map('intval', $_SESSION['products'])) . ')');
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

	<h1>Commande :</h1>
	<hr>
	<?php
	$c = 1;
	$price = 0;
	while ($p=$products->fetch()) {
		echo $c . '/ ' . $p['Label'] . ' au prix de '. $p['Price'] . '€ <hr>';
		$price = $price + (float)$p['Price'];
		$c+=1;
	}
	$_SESSION['orderPrice'] = $price;
	?>
	
	<p>Prix total : <?php echo $_SESSION['orderPrice']; ?>€ </p>

	<form action="saveOrder.php" method="get">
		<label for='addr'>Adresse</label> : <input type="text" name="addr"> <br>
		<label for="drive">A emporter ? </label> : <input type="checkbox" name="drive"> <br>

		<input type="submit" value="Valider la commande">

	</form>

</body>
</html>

