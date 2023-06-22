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
		<h2>Inscription</h2>
		<form action="register.php" method="POST">
			<div>
				<label for="reg_username">Nom d'utilisateur :</label>
				<input type="text" id="reg_username" name="username" required>
			</div>
			<div>
				<label for="reg_password">Mot de passe :</label>
				<input type="password" id="reg_password" name="password" required>
			</div>
			<div>
				<input type="submit" value="S'inscrire">
			</div>
		</form>
	</div>

	<footer>
		<?php include('footer.php'); ?>
	</footer>
	<script src="java.js"></script>
</body>
</html>
