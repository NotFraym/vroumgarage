<?php
session_start();

// Vérifiez si l'utilisateur est connecté et a le statut d'administrateur
if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'admin') {
    // L'utilisateur est connecté en tant qu'administrateur, autorisez l'accès à la page
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'administration</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

	<header>
		<?php include('header.php'); ?>
	</header>

	<br>
	<div class="ajout">
		<a href="/ajout_vehicule.php"><button>Ajouter un véhicule</button></a>
		<br>
		<a href="/suppr_modif_vehicule.php"><button>Modifier ou supprimer un véhicule</button></a>
		<br>
	</div>

	<!-- login -->

	<!-- start footer -->
	<footer>
		<?php include('footer.php'); ?>
	</footer>
	<script src="java.js"></script>
</body>
</html>

<?php
} else {
    // Redirigez l'utilisateur vers une autre page ou affichez un message d'erreur
    header("Location: index.php");
    exit;
}
?>
