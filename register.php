<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashed_password = hash('sha256', $password);

	// Enregistrer le nouvel utilisateur dans la base de données avec le statut "client"


	// Connexion à la base de données
	$servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "garage";

	$conn = new mysqli($servername, $db_username, $db_password, $db_name);

	if ($conn->connect_error) {
		die("Connexion échouée : " . $conn->connect_error);
	}

	// Vérifier si le nom d'utilisateur existe déjà
	$stmt = $conn->prepare("SELECT id FROM user WHERE nom = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		// Le nom d'utilisateur existe déjà
		echo "Le nom d'utilisateur existe déjà. Veuillez en choisir un autre.";
	} else {
		// Insérer le nouvel utilisateur dans la base de données
		$stmt = $conn->prepare("INSERT INTO user (nom, mdp, statut) VALUES (?, ?, 'client')");
		$stmt->bind_param("ss", $username, $hashed_password);
		$stmt->execute();

		echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
		echo "<a href='index.php'><button>Retour à la page d'accueil</button></a>";
	}

	$stmt->close();
	$conn->close();
}
?>
