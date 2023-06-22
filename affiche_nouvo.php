<?php
// Connexion à la base de données
include('connexion.php');

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour récupérer les 12 derniers véhicules inscrits en fonction de la colonne "date_rentree_garage"
$sql = "SELECT * FROM vehicule ORDER BY date_rentree_garage DESC LIMIT 9";

// Exécution de la requête SQL
$result = $conn->query($sql);

// Vérification si des résultats ont été renvoyés
if ($result->num_rows > 0) {
    // Affichage des résultats
    while ($row = $result->fetch_assoc()) {
        echo "<div class='vehicule'>";
        echo "<p>Type : " . $row["type"] . "</p>";
        echo "<p>Marque : " . $row["marque"] . "</p>";
        echo "<p>Modèle : " . $row["modele"] . "</p>";
        echo "<p>Immatriculation : " . $row["immatriculation"] . "</p>";
        echo "<p>Date de première circulation : " . $row["date_premiere_circulation"] . "</p>";
        echo "<p>Prix : " . $row["prix"] . "</p>";
        echo "<p>Date de rentrée au garage : " . $row["date_rentree_garage"] . "</p>";
        echo "<p>Chevaux : " . $row["chevaux"] . "</p>";
        echo "<p>Description : " . $row["description"] . "</p>";
        
        // Construction du chemin d'accès de l'image en utilisant le nom de la plaque d'immatriculation
        $imagePath = "image_vehicule/" . $row["immatriculation"] . ".jpg";
        
        // Vérification si l'image existe avant de l'afficher
        if (file_exists($imagePath)) {
            echo "<img src='$imagePath' alt='image' style='max-width: 300px;' />";
        } else {
            echo "<p>Aucune image disponible.</p>";
        }
        
        echo "</div>";
    }
} else {
    echo "Aucun véhicule trouvé dans la base de données.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
