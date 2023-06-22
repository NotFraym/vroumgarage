<?php
include('header.php');

// Vérification que les données ont bien été envoyées en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'immatriculation du véhicule à supprimer
    $immatriculation = $_POST['immatriculation'];
    
    // Connexion à la base de données
    include('connexion.php');

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Récupération du nom du fichier image associé au véhicule
    $sql = "SELECT image FROM vehicule WHERE immatriculation = '$immatriculation'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageFileName = $row['image'];
        
        // Suppression des données du véhicule de la base de données
        $sqlDelete = "DELETE FROM vehicule WHERE immatriculation = '$immatriculation'";
        
        // Exécution de la requête de suppression des données du véhicule
        if ($conn->query($sqlDelete) === TRUE) {
            // Suppression du fichier image du dossier "image_vehicule"
            $imageFilePath = "image_vehicule/" . $imageFileName;
            if (file_exists($imageFilePath)) {
                unlink($imageFilePath);
            }
            
            echo "Suppression effectuée avec succès.";
        } else {
            echo "Erreur lors de la suppression : " . $conn->error;
        }
    } else {
        echo "Le véhicule sélectionné n'existe pas.";
    }
    
    // Fermeture de la connexion à la base de données
    $conn->close();
} else {
    echo "Veuillez remplir le formulaire de suppression.";
}

echo "<a href='index.php'><button>Retour à la page d'accueil</button></a>";

include('footer.php');
?>
