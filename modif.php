<?php
// Connexion à la base de données
include('connexion.php');

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérification que les données ont bien été envoyées en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'immatriculation du véhicule à modifier
    $immatriculation = $_POST['immatriculation'];

    // Requête SQL pour récupérer les informations du véhicule à modifier
    $sql = "SELECT * FROM vehicule WHERE immatriculation = '$immatriculation'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $type = $row['type'];
        $marque = $row['marque'];
        $modele = $row['modele'];
        $date_premiere_circulation = $row['date_premiere_circulation'];
        $prix = $row['prix'];
        $date_rentree_garage = $row['date_rentree_garage'];
        $chevaux = $row['chevaux'];
        $description = $row['description'];
        $image = $row['image'];

        // Affichage du formulaire pré-rempli avec les informations du véhicule à modifier
        include('header.php');
        echo '
        <div class="ajout">
        <form action="modifier_vehicule.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="immatriculation" value="'.$immatriculation.'">
            
            <div>
                <label for="type">Type de véhicule :</label>
                <input type="text" id="type" name="type" value="'.$type.'">
            </div>
            
            <div>
                <label for="immatriculation">Numéro d\'immatriculation :</label>
                <input type="text" id="immatriculation" name="immatriculation" value="'.$immatriculation.'">
            </div>
            
            <div>
                <label for="marque">Marque :</label>
                <select id="marque" name="marque">
                    <!-- Options pour les marques ici -->
                </select>
            </div>
            
            <div>
                <label for="modele">Modèle :</label>
                <input type="text" id="modele" name="modele" value="'.$modele.'">
            </div>
            
            <div>
                <label for="date_premiere_circulation">Date de première circulation :</label>
                <input type="date" id="date_premiere_circulation" name="date_premiere_circulation" value="'.$date_premiere_circulation.'">
            </div>
            
            <div>
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" value="'.$prix.'">
            </div>
            
            <div>
                <label for="date_rentree_garage">Date de rentrée au garage :</label>
                <input type="date" id="date_rentree_garage" name="date_rentree_garage" value="'.$date_rentree_garage.'">
            </div>
            
            <div>
                <label for="chevaux">Chevaux fiscaux :</label>
                <input type="number" id="chevaux" name="chevaux" value="'.$chevaux.'">
            </div>
            
            <div>
                <label for="description">Description :</label>
                <textarea id="description" name="description">'.$description.'</textarea>
            </div>
            
            <div>
                <label for="nouvelle_image">Nouvelle Image :</label>
                <input type="file" id="nouvelle_image" name="nouvelle_image" class="custom-file-input">
            </div>
            
            <div>
                <br><br><button type="submit">Modifier</button>
            </div>
        </form>
        </div>';

        include('footer.php');
    } else {
        echo "Aucun véhicule trouvé avec l'immatriculation : $immatriculation";
    }
} else {
    echo "Méthode de requête invalide.";
}

$conn->close();
?>
