<!DOCTYPE html>
<html>
<head>
	<title>Market Place</title>
	<meta charset="utf-8">
</head>
<body>
	<?php include 'includes/navbar.php'; ?>

	<?php 
	if ($_SESSION['tryConnection']) {
		echo '<p>L\'email n\'existe pas dans la bdd.</p>';
	} elseif ($_SESSION['tryPassword']) {
		echo '<p>Le mot de passe est éroné.</p>';
	}

	?>
	

	<form action="trySignin.php" method="post">
		<label for="mail">Email</label> : <input type="text" name="mail"> <br>
		<label for="mdp">Mot de Passe</label> : <input type="password" name="mdp"> <br>
		<input type="submit" value="Connection">
	</form>
</body>
</html>