<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Effectuer la vérification du nom d'utilisateur et du mot de passe dans la base de données
	// Assurez-vous d'utiliser des requêtes préparées pour éviter les injections SQL

	// Connexion à la base de données
	$servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "garage";

	$conn = new mysqli($servername, $db_username, $db_password, $db_name);

	if ($conn->connect_error) {
		die("Connexion échouée : " . $conn->connect_error);
	}

	// Requête pour vérifier les informations d'identification de l'utilisateur
	$stmt = $conn->prepare("SELECT id, nom, mdp, statut FROM user WHERE nom = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows === 1) {
		$row = $result->fetch_assoc();
		$hashed_password = hash('sha256', $password);

		if (hash('sha256', $password) === $row['mdp']) {

			$_SESSION['username'] = $row['nom'];
			$_SESSION['statut'] = $row['statut'];

			// Rediriger vers la page d'accueil ou autre page souhaitée après la connexion réussie
			header("Location: index.php");
			exit();
		} else {
			// Mot de passe incorrect
			header("Location: login.php");
			exit();
		}
	} else {
		// Nom d'utilisateur incorrect
		header("Location: login.php");
		exit();
	}

	$stmt->close();
	$conn->close();
}
?>
