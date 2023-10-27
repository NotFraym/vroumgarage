<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $host = '      ';
    $user = '      ';
    $pass = '      ';
    $dbname = '      ';

    $conn = new mysqli($host, $user, $pass, $dbname);

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

        if ($hashed_password === $row['mdp']) {

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