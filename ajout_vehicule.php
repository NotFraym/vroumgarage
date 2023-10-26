<?php
session_start();

// Vérifiez si l'utilisateur est connecté et a le statut d'administrateur
if (!isset($_SESSION['username']) || $_SESSION['statut'] !== 'admin') {
    // Redirigez l'utilisateur vers une autre page ou affichez un message d'erreur
    header("Location: page_non_autorisee.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un véhicule - Administration</title>
</head>
<body>

<header>
    <?php include('header.php'); ?>
</header>

<br>

<div class="ajout">
    <h3>Afin d'ajouter un véhicule, veuillez entrer toutes les informations nécessaires :</h3>

    <br>

    <form action="ajout.php" method="post" enctype="multipart/form-data">

        <div>
            <label for="name">Type de véhicule :</label>
            <input type="text" id="type" name="type">
        </div>

        <div>
            <label for="name">Numéro d'immatriculation :</label>
            <input type="text" id="immatriculation" name="immatriculation">
        </div>

        <div>
            <label for="marque">Marque :</label>
            <select id="marque" name="marque">
            <option value="Acura">Acura</option>
<option value="Alfa Romeo">Alfa Romeo</option>
<option value="Aston Martin">Aston Martin</option>
<option value="Audi">Audi</option>
<option value="Autre">Autre</option>
<option value="Bentley">Bentley</option>
<option value="BMW">BMW</option>
<option value="Bugatti">Bugatti</option>
<option value="Cadillac">Cadillac</option>
<option value="Chery">Chery</option>
<option value="Chevrolet">Chevrolet</option>
<option value="Chrysler">Chrysler</option>
<option value="Citroën">Citroën</option>
<option value="Dacia">Dacia</option>
<option value="Daewoo">Daewoo</option>
<option value="Dodge">Dodge</option>
<option value="Ferrari">Ferrari</option>
<option value="Fiat">Fiat</option>
<option value="Ford">Ford</option>
<option value="GMC">GMC</option>
<option value="Geely">Geely</option>
<option value="Honda">Honda</option>
<option value="Hummer">Hummer</option>
<option value="Hyundai">Hyundai</option>
<option value="Infiniti">Infiniti</option>
<option value="Isuzu">Isuzu</option>
<option value="JAC Motors">JAC Motors</option>
<option value="Jaguar">Jaguar</option>
<option value="Jeep">Jeep</option>
<option value="Kawasaki">Kawasaki</option>
<option value="Kia">Kia</option>
<option value="Koenigsegg">Koenigsegg</option>
<option value="Lamborghini">Lamborghini</option>
<option value="Lancia">Lancia</option>
<option value="Land Rover">Land Rover</option>
<option value="Lexus">Lexus</option>
<option value="Lincoln">Lincoln</option>
<option value="Lotus">Lotus</option>
<option value="Maserati">Maserati</option>
<option value="Maybach">Maybach</option>
<option value="Mazda">Mazda</option>
<option value="Mercedes-Benz">Mercedes-Benz</option>
<option value="MG">MG</option>
<option value="Mini">Mini</option>
<option value="Mitsubishi">Mitsubishi</option>
<option value="Nissan">Nissan</option>
<option value="Opel">Opel</option>
<option value="Pagani">Pagani</option>
<option value="Peugeot">Peugeot</option>
<option value="Pontiac">Pontiac</option>
<option value="Porsche">Porsche</option>
<option value="Proton">Proton</option>
<option value="Renault">Renault</option>
<option value="Rolls-Royce">Rolls-Royce</option>
<option value="Rover">Rover</option>
<option value="Smart">Smart</option>
<option value="Subaru">Subaru</option>
<option value="Suzuki">Suzuki</option>
<option value="Tesla">Tesla</option>
<option value="Toyota">Toyota</option>
<option value="Vauxhall">Vauxhall</option>
<option value="Volkswagen">Volkswagen</option>
<option value="Volvo">Volvo</option>
<option value="Wuling">Wuling</option>
<option value="Zotye">Zotye</option>
<option value="Aprilia">Aprilia</option>
<option value="BMW Motorrad">BMW Motorrad</option>
<option value="Ducati">Ducati</option>
<option value="Harley-Davidson">Harley-Davidson</option>
<option value="Honda Motorcycles">Honda Motorcycles</option>
<option value="Husqvarna">Husqvarna</option>
<option value="Indian Motorcycle">Indian Motorcycle</option>
<option value="Kawasaki Motorcycles">Kawasaki Motorcycles</option>
<option value="KTM">KTM</option>
<option value="Suzuki Motorcycles">Suzuki Motorcycles</option>
<option value="Triumph">Triumph</option>
<option value="Yamaha">Yamaha</option>

            </select>
        </div>

        <div>
            <label for="name">Modèle :</label>
            <input type="text" id="modele" name="modele">
        </div>

        <div>
            <label for="name">Date de première mise en circulation du véhicule :</label>
            <input type="date" id="1circu" name="1circu">
        </div>

        <div>
            <label for="name">Prix du véhicule :</label>
            <input type="number" id="prix" name="prix">
        </div>

        <div>
            <label for="name">Date de rentrée au garage :</label>
            <input type="date" id="rentr_garage" name="rentr_garage">
        </div>

        <div>
            <label for="name">Nombre de chevaux fiscaux :</label>
            <input type="number" id="chevaux" name="chevaux">
        </div>

        <div>
            <label for="name">Description :</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="name">Image du véhicule :</label>
            <input type="file" id="image" name="image" class="custom-file-input">
        </div>

        <br><br><button type="submit">Ajouter ce véhicule</button>
    </form>

    <br>
</div>

<br>

<!-- start footer -->
<footer>
    <?php include('footer.php'); ?>
</footer>

</body>
</html>

            

         