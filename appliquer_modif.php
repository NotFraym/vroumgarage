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
        <form action="modif.php" method="post" enctype="multipart/form-data">
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
                    <option value="Acura" '.($marque=="Acura"?"selected":"").'>Acura</option>
                    <option value="Alfa Romeo" '.($marque=="Alfa Romeo"?"selected":"").'>Alfa Romeo</option>
                    <option value="Aston Martin" '.($marque=="Aston Martin"?"selected":"").'>Aston Martin</option>
                    <option value="Audi" '.($marque=="Audi"?"selected":"").'>Audi</option>
                    <option value="Autre" '.($marque=="Autre"?"selected":"").'>Autre</option>
                    <option value="Bentley" '.($marque=="Bentley"?"selected":"").'>Bentley</option>
                    <option value="BMW" '.($marque=="BMW"?"selected":"").'>BMW</option>
                    <option value="Bugatti" '.($marque=="Bugatti"?"selected":"").'>Bugatti</option>
                    <option value="Cadillac" '.($marque=="Cadillac"?"selected":"").'>Cadillac</option>
                    <option value="Chery" '.($marque=="Chery"?"selected":"").'>Chery</option>
                    <option value="Chevrolet" '.($marque=="Chevrolet"?"selected":"").'>Chevrolet</option>
                    <option value="Chrysler" '.($marque=="Chrysler"?"selected":"").'>Chrysler</option>
                    <option value="Citroën" '.($marque=="Citroën"?"selected":"").'>Citroën</option>
                    <option value="Dacia" '.($marque=="Dacia"?"selected":"").'>Dacia</option>
                    <option value="Daewoo" '.($marque=="Daewoo"?"selected":"").'>Daewoo</option>
                    <option value="Dodge" '.($marque=="Dodge"?"selected":"").'>Dodge</option>
                    <option value="Ferrari" '.($marque=="Ferrari"?"selected":"").'>Ferrari</option>
                    <option value="Fiat" '.($marque=="Fiat"?"selected":"").'>Fiat</option>
                    <option value="Ford" '.($marque=="Ford"?"selected":"").'>Ford</option>
                    <option value="GMC" '.($marque=="GMC"?"selected":"").'>GMC</option>
                    <option value="Geely" '.($marque=="Geely"?"selected":"").'>Geely</option>
                    <option value="Honda" '.($marque=="Honda"?"selected":"").'>Honda</option>
                    <option value="Hummer" '.($marque=="Hummer"?"selected":"").'>Hummer</option>
                    <option value="Hyundai" '.($marque=="Hyundai"?"selected":"").'>Hyundai</option>
                    <option value="Infiniti" '.($marque=="Infiniti"?"selected":"").'>Infiniti</option>
                    <option value="Isuzu" '.($marque=="Isuzu"?"selected":"").'>Isuzu</option>
                    <option value="JAC Motors" '.($marque=="JAC Motors"?"selected":"").'>JAC Motors</option>
                    <option value="Jaguar" '.($marque=="Jaguar"?"selected":"").'>Jaguar</option>
                    <option value="Jeep" '.($marque=="Jeep"?"selected":"").'>Jeep</option>
                    <option value="Kawasaki" '.($marque=="Kawasaki"?"selected":"").'>Kawasaki</option>
                    <option value="Kia" '.($marque=="Kia"?"selected":"").'>Kia</option>
                    <option value="Koenigsegg" '.($marque=="Koenigsegg"?"selected":"").'>Koenigsegg</option>
                    <option value="Lamborghini" '.($marque=="Lamborghini"?"selected":"").'>Lamborghini</option>
                    <option value="Lancia" '.($marque=="Lancia"?"selected":"").'>Lancia</option>
                    <option value="Land Rover" '.($marque=="Land Rover"?"selected":"").'>Land Rover</option>
                    <option value="Lexus" '.($marque=="Lexus"?"selected":"").'>Lexus</option>
                    <option value="Lincoln" '.($marque=="Lincoln"?"selected":"").'>Lincoln</option>
                    <option value="Lotus" '.($marque=="Lotus"?"selected":"").'>Lotus</option>
                    <option value="Maserati" '.($marque=="Maserati"?"selected":"").'>Maserati</option>
                    <option value="Maybach" '.($marque=="Maybach"?"selected":"").'>Maybach</option>
                    <option value="Mazda" '.($marque=="Mazda"?"selected":"").'>Mazda</option>
                    <option value="Mercedes-Benz" '.($marque=="Mercedes-Benz"?"selected":"").'>Mercedes-Benz</option>
                    <option value="MG" '.($marque=="MG"?"selected":"").'>MG</option>
                    <option value="Mini" '.($marque=="Mini"?"selected":"").'>Mini</option>
                    <option value="Mitsubishi" '.($marque=="Mitsubishi"?"selected":"").'>Mitsubishi</option>
                    <option value="Nissan" '.($marque=="Nissan"?"selected":"").'>Nissan</option>
                    <option value="Opel" '.($marque=="Opel"?"selected":"").'>Opel</option>
                    <option value="Pagani" '.($marque=="Pagani"?"selected":"").'>Pagani</option>
                    <option value="Peugeot" '.($marque=="Peugeot"?"selected":"").'>Peugeot</option>
                    <option value="Pontiac" '.($marque=="Pontiac"?"selected":"").'>Pontiac</option>
                    <option value="Porsche" '.($marque=="Porsche"?"selected":"").'>Porsche</option>
                    <option value="Proton" '.($marque=="Proton"?"selected":"").'>Proton</option>
                    <option value="Renault" '.($marque=="Renault"?"selected":"").'>Renault</option>
                    <option value="Rolls-Royce" '.($marque=="Rolls-Royce"?"selected":"").'>Rolls-Royce</option>
                    <option value="Rover" '.($marque=="Rover"?"selected":"").'>Rover</option>
                    <option value="Smart" '.($marque=="Smart"?"selected":"").'>Smart</option>
                    <option value="Subaru" '.($marque=="Subaru"?"selected":"").'>Subaru</option>
                    <option value="Suzuki" '.($marque=="Suzuki"?"selected":"").'>Suzuki</option>
                    <option value="Tesla" '.($marque=="Tesla"?"selected":"").'>Tesla</option>
                    <option value="Toyota" '.($marque=="Toyota"?"selected":"").'>Toyota</option>
                    <option value="Vauxhall" '.($marque=="Vauxhall"?"selected":"").'>Vauxhall</option>
                    <option value="Volkswagen" '.($marque=="Volkswagen"?"selected":"").'>Volkswagen</option>
                    <option value="Volvo" '.($marque=="Volvo"?"selected":"").'>Volvo</option>
                    <option value="Wuling" '.($marque=="Wuling"?"selected":"").'>Wuling</option>
                    <option value="Zotye" '.($marque=="Zotye"?"selected":"").'>Zotye</option>
                    <option value="Aprilia" '.($marque=="Aprilia"?"selected":"").'>Aprilia</option>
                    <option value="BMW Motorrad" '.($marque=="BMW Motorrad"?"selected":"").'>BMW Motorrad</option>
                    <option value="Ducati" '.($marque=="Ducati"?"selected":"").'>Ducati</option>
                    <option value="Harley-Davidson" '.($marque=="Harley-Davidson"?"selected":"").'>Harley-Davidson</option>
                    <option value="Honda Motorcycle" '.($marque=="Honda Motorcycle"?"selected":"").'>Honda Motorcycle</option>
                    <option value="Kawasaki Motorcycle" '.($marque=="Kawasaki Motorcycle"?"selected":"").'>Kawasaki Motorcycle</option>
                    <option value="KTM" '.($marque=="KTM"?"selected":"").'>KTM</option>
                    <option value="Piaggio" '.($marque=="Piaggio"?"selected":"").'>Piaggio</option>
                    <option value="Suzuki Motorcycle" '.($marque=="Suzuki Motorcycle"?"selected":"").'>Suzuki Motorcycle</option>
                    <option value="Triumph" '.($marque=="Triumph"?"selected":"").'>Triumph</option>
                    <option value="Yamaha" '.($marque=="Yamaha"?"selected":"").'>Yamaha</option>
                    <option value="Autre" '.($marque=="Autre"?"selected":"").'>Autre</option>
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
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" class="custom-file-input">
                <img src="image_vehicule/'.$image.'" alt="Image du véhicule" width="200px">

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
