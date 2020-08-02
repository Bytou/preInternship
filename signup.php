<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Market Place</title>
	<meta charset="utf-8">
</head>
<body>
	<?php include 'includes/navbar.php'; ?>

	<h1>Inscription</h1>

	<form action="saveSignup.php" method="post">
		<label for="first">Prénom</label> : <input type="text" name="first"> <br>
		<label for="last">Nom</label> : <input type="text" name="last"> <br>
		<label for="mail">Email</label> : <input type="text" name="mail"> <br>
		<label for="mdp">Mot de Passe</label> : <input type="password" name="mdp"> <br>
		<input type="submit" name="Enregistrer">
	</form>


</body>
</html>