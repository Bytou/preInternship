

<h1> <a href="index.php"> Market Place </a></h1>


<section>
	<?php 
	if (isset($_SESSION['name'])){
		echo 'Bonjour '.$_SESSION['name'] . ' <button onclick="window.location.href=\'deco.php\'">Déco</button>';
	} else { ?>
		<a href="signup.php">S'inscrire</a> 
		<a href="signin.php">Se connecter</a> 
	<?php } ?>
</section>

<nav>
	<a href="order.php">Commande</a>
	<a href=" ">Historique</a>
	<a href=" ">Profil</a>
</nav>

<hr>