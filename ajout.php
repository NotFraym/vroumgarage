<?php
// Connexion à la base de données
include('connexion.php');

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données du formulaire
$type = $_POST['type'];
$immatriculation = $_POST['immatriculation'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$date_circulation = $_POST['1circu'];
$prix = $_POST['prix'];
$date_rentr_garage = $_POST['rentr_garage'];
$chevaux = $_POST['chevaux'];
$description = $_POST['description'];
$image = $_FILES['image']['name']; // Nom du fichier
$image_tmp = $_FILES['image']['tmp_name']; // Emplacement temporaire du fichier

if(!empty($type) && !empty($immatriculation) && !empty($marque) && !empty($modele) && !empty($date_circulation) && !empty($prix) && !empty($date_rentr_garage) && !empty($chevaux) && !empty($description) && !empty($image)) {
    // Vérification si la plaque existe déjà dans la base de données
    $check_plaque = "SELECT * FROM vehicule WHERE immatriculation = '$immatriculation'";
    $result = $conn->query($check_plaque);
    if ($result->num_rows > 0) {
        echo "Impossible d'ajouter le véhicule : la plaque d'immatriculation existe déjà.";
    } else {
        // Renommer le fichier avec le numéro d'immatriculation
        $extension = pathinfo($image, PATHINFO_EXTENSION); // Obtenir l'extension du fichier
        $new_image_name = $immatriculation . '.' . $extension; // Nouveau nom de fichier avec l'extension

        // Préparation de la requête SQL
        $new_image_name = mysqli_real_escape_string($conn, $new_image_name); // Échapper les caractères spéciaux dans le nom de fichier
        $sql = "INSERT INTO vehicule (type, immatriculation, marque, modele, date_premiere_circulation, prix, date_rentree_garage, chevaux, description, image) 
                VALUES ('$type', '$immatriculation', '$marque', '$modele', '$date_circulation', $prix, '$date_rentr_garage', $chevaux, '$description', '$new_image_name')";

        // Exécution de la requête SQL
        if ($conn->query($sql) === TRUE) {
            $destination = 'image_vehicule/' . $new_image_name; // Chemin de destination avec le nouveau nom de fichier
            move_uploaded_file($image_tmp, $destination);
            echo "Véhicule ajouté avec succès";
        } else {
            echo "Erreur lors de l'ajout du véhicule : " . $conn->error;
        }
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}

// Fermeture de la connexion à la base de données
$conn->close();
echo "<a href='index.php'><button>Retour à l'accueil</button></a>";
?>
