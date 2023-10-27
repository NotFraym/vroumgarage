<!DOCTYPE html>
<html>
<head>
    <title>Liste des voitures</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>

    <form method="POST" action="" class="filtre">
        <label for="filtre">Filtrer les voitures par marque :</label>
        <br><br>
        <select name="filtre" id="filtre">
    <option value="">Toutes les marques</option> <!-- Option "Toutes les marques" -->
    <!-- Options de filtrage récupérées de la base de données -->
    <?php
    // Connexion à la base de données
    include('connexion.php');

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les marques distinctes de la table vehicule
    $marquesQuery = "SELECT DISTINCT marque FROM vehicule";
    $marquesResult = $conn->query($marquesQuery);

    if ($marquesResult->num_rows > 0) {
        while ($marqueRow = $marquesResult->fetch_assoc()) {
            $marque = $marqueRow["marque"];
            echo "<option value='$marque'>$marque</option>";
        }
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
</select>

        <br><br><input type="submit" value="Filtrer">
    </form>

    <?php
    // Connexion à la base de données
    include('connexion.php');

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Récupérer la valeur du filtre de marque (si un filtre a été sélectionné)
    $filtreMarque = isset($_POST['filtre']) ? $_POST['filtre'] : '';

    // Requête SQL pour récupérer les véhicules filtrés par type "voiture" et marque sélectionnée
    $sql = "SELECT * FROM vehicule WHERE type = 'voiture'";

    if (!empty($filtreMarque)) {
        // Ajouter la condition de filtrage par marque
        $sql .= " AND marque = '$filtreMarque'";
    }

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
        echo "Aucun véhicule de type 'voiture' trouvé dans la base de données.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
</body>
</html>
