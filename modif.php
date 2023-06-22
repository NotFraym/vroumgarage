<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "garage");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupération des données du formulaire
$immatriculation = $_POST['immatriculation'];
$type = $_POST['type'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$date_premiere_circulation = $_POST['date_premiere_circulation'];
$prix = $_POST['prix'];
$date_rentree_garage = $_POST['date_rentree_garage'];
$chevaux = $_POST['chevaux'];
$description = $_POST['description'];

// Requête SQL pour mettre à jour les informations du véhicule
$sql = "UPDATE vehicule SET type = '$type', marque = '$marque', modele = '$modele', date_premiere_circulation = '$date_premiere_circulation', prix = '$prix', date_rentree_garage = '$date_rentree_garage', chevaux = '$chevaux', description = '$description' WHERE immatriculation = '$immatriculation'";

// Vérifier si l'image a été modifiée
if (!empty($_FILES['nouvelle_image']['name'])) {
    $nouvelleImage = $_FILES['nouvelle_image'];
    
    // Gérer le téléchargement de la nouvelle image
    $cheminImage = "image_vehicule/"; // Chemin du répertoire où vous souhaitez enregistrer les images
    $nomImage = $_POST['immatriculation'] . "." . pathinfo($nouvelleImage['name'], PATHINFO_EXTENSION);
    $cheminCompletImage = $cheminImage . $nomImage;

    // Supprimer l'ancienne image si elle existe
    if (file_exists($cheminCompletImage)) {
        unlink($cheminCompletImage);
    }

    if (move_uploaded_file($nouvelleImage['tmp_name'], $cheminCompletImage)) {
        // L'image a été téléchargée avec succès, mettez à jour le chemin de l'image dans la requête SQL
        $sql = "UPDATE vehicule SET type = '$type', marque = '$marque', modele = '$modele', date_premiere_circulation = '$date_premiere_circulation', prix = '$prix', date_rentree_garage = '$date_rentree_garage', chevaux = '$chevaux', description = '$description', image = '$cheminCompletImage' WHERE immatriculation = '$immatriculation'";
    } else {
        echo "Erreur lors du téléchargement de l'image.";
        exit;
    }
}

// Exécutez la requête SQL pour mettre à jour les informations du véhicule
if ($conn->query($sql) === TRUE) {
    echo "Modification effectuée avec succès.";
} else {
    echo "Erreur lors de la modification : " . $conn->error;
}

echo "<a href='index.php'><button>Retour à la page d'accueil</button></a>";

// Fermeture de la connexion à la base de données
$conn->close();
?>
