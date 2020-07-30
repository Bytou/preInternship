<?php 
session_start();
?>

<h1>Market Place</h1>


<section>
	<?php 
	if (isset($_SESSION['name'])){
		echo 'Bonjour '.$_SESSION['name'] . ' <a href="deco.php">Déco</a>';
	} else { ?>
		<a href="signup.php">S'inscrire</a> 
		<a href="signin.php">Se connecter</a> 
	<?php } ?>
</section>

<nav>
	<a href=" ">Commande</a>
	<a href=" ">Historique</a>
	<a href=" ">Profil</a>
</nav>

<hr>