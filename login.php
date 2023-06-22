<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page de connexion</title>
</head>
<body>
	<header>
		<?php include('header.php'); ?>
	</header> 

	<div class="login">
		<h2>Connexion</h2>
		<form action="login_process.php" method="POST">
			<div>
				<label for="username">Nom d'utilisateur :</label>
				<input type="text" id="username" name="username" required>
			</div>
			<div>
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="password" required>
			</div>
            <button><a href="inscription.php">Inscription</a></button>
			<div>
				<input type="submit" value="Se connecter">
			</div>
		</form>
	</div>


	<footer>
		<?php include('footer.php'); ?>
	</footer>
	<script src="java.js"></script>
</body>
</html>
