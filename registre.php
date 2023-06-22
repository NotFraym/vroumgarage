<?php
session_start(); // Démarre une session PHP pour stocker les données de session

if ($_SERVER["REQUEST_METHOD"] === "POST") { // Vérifie si la requête est de type POST (formulaire soumis)
    $username = $_POST['username']; // Récupère le nom d'utilisateur du formulaire soumis
    $password = $_POST['password']; // Récupère le mot de passe du formulaire soumis
    $hashed_password = hash('sha256', $password); // Hache le mot de passe avec l'algorithme de hachage SHA256

    // Enregistrer le nouvel utilisateur dans la base de données avec le statut "client"

    // Connexion à la base de données
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "garage";
    $conn = new mysqli($servername, $db_username, $db_password, $db_name); // Établit une connexion à la base de données

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error); // Arrête le programme si la connexion à la base de données échoue
    }

    // Vérifier si le nom d'utilisateur existe déjà
    $stmt = $conn->prepare("SELECT id FROM user WHERE nom = ?"); // Prépare une requête SQL pour vérifier l'existence du nom d'utilisateur
    $stmt->bind_param("s", $username); // Lie le paramètre (nom d'utilisateur) à la requête préparée
    $stmt->execute(); // Exécute la requête SQL
    $result = $stmt->get_result(); // Récupère le résultat de la requête

    if ($result->num_rows > 0) {
        // Le nom d'utilisateur existe déjà
        echo "Le nom d'utilisateur existe déjà. Veuillez en choisir un autre.";
    } else {
        // Insérer le nouvel utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO user (nom, mdp, statut) VALUES (?, ?, 'client')"); // Prépare une requête SQL pour insérer le nouvel utilisateur
        $stmt->bind_param("ss", $username, $hashed_password); // Lie les paramètres (nom d'utilisateur et mot de passe haché) à la requête préparée
        $stmt->execute(); // Exécute la requête SQL

        echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        echo "<a href='index.php'><button>Retour à la page d'accueil</button></a>";
    }

    $stmt->close(); // Ferme la requête préparée
    $conn->close(); // Ferme la connexion à la base de données
}
?>
