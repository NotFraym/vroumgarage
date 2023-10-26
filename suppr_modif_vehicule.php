<?php
session_start();

// Vérifiez si l'utilisateur est connecté et a le statut d'administrateur
if (!isset($_SESSION['username']) || $_SESSION['statut'] !== 'admin') {
    // Redirigez l'utilisateur vers une autre page ou affichez un message d'erreur
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier ou supprimer un véhicule - Administration</title>
</head>
<body>
    <header>
        <?php include('header.php'); ?>
    </header>

    <br>

    <div class="ajout">
        <h3>Afin de supprimer un véhicule, sélectionnez sa plaque d'immatriculation :</h3>
        <br>
        <form action="suppr.php" method="post">
            <div>
                <label for="immatriculation">Plaque d'immatriculation :</label>
                <select name="immatriculation" id="immatriculation">
                    <?php
                    // Connexion à la base de données
                    include('connexion.php');

                    $conn = new mysqli($host, $user, $pass, $dbname);
                    if ($conn->connect_error) {
                        die("Connexion échouée : " . $conn->connect_error);
                    }

                    // Récupération des plaques d'immatriculation existantes
                    $sql = "SELECT immatriculation FROM vehicule";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['immatriculation'] . "'>" . $row['immatriculation'] . "</option>";
                        }
                    }

                    // Fermeture de la connexion à la base de données
                    $conn->close();
                    ?>
                </select>
            </div>

            <button type="submit">Supprimer les données de ce véhicule</button>
        </form>
    </div>

    <div class="ajout">
        <h3>Afin de modifier un véhicule, sélectionnez sa plaque d'immatriculation :</h3>
        <br>
        <form action="appliquer_modif.php" method="post">
            <div>
                <label for="immatriculation">Plaque d'immatriculation :</label>
                <select name="immatriculation" id="immatriculation">
                    <?php
                    // Connexion à la base de données
                    include('connexion.php');

                    $conn = new mysqli($host, $user, $pass, $dbname);
                    if ($conn->connect_error) {
                        die("Connexion échouée : " . $conn->connect_error);
                    }

                    // Récupération des plaques d'immatriculation existantes
                    $sql = "SELECT immatriculation FROM vehicule";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['immatriculation'] . "'>" . $row['immatriculation'] . "</option>";
                        }
                    }

                    // Fermeture de la connexion à la base de données
                    $conn->close();
                    ?>
                </select>
            </div>

            <button type="submit">Modifier ce véhicule</button>
        </form>
        <br>
    </div>
    </div>

    <br>

   <!-- start footer -->
<footer>
    <?php include('footer.php'); ?>
</footer>

</body>
</html>
