<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<!-- lier le jQuery via un CDN -->
	<title>Page d'Accueil</title>
</head>

<body>

<!-- start header -->
<header>
<?php include('header.php'); ?>
	</header>
<!-- fin header -->




<!-- start tri-corps -->
<div class="container">
  <div id="electrique" class="section">
    <div class="content">
    <h4><a href="/nouveautes.php" class="btn"><h1>Nouveautés</h1></a></h4>
    </div>
    <div class="overlay"></div>
  </div>
  <div id="disponibles" class="section">
    <div class="content">
    <h4><a href="/voitures.php" class="btn"><h1>Voitures</h1></a></h4>
    </div>
    <div class="overlay"></div>
  </div>
  <div id="rs" class="section">
  <div class="content">
    <h4><a href="/motos.php" class="btn"><h1>Motos</h1></a></h4>
    </div>
    <div class="overlay"></div>
  </div>
</div>
  <!-- START etage 2-->
  <body>

</body>

<!-- start footer -->
<footer>
<?php include('footer.php'); ?>
</footer>

</body>
</html>