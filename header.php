
<header>
	<div class="logo">
		<a href="index.php">
			<img src="img/vroum.png" alt="Logo">
		</a>
	</div>
	<nav>
		<div class="menu-icon">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
		<ul class="menu">
			<li><a href="nouveautes.php">Nouveautés</a></li>
			<li><a href="voitures.php">Voiture</a></li>
			<li><a href="motos.php">Moto</a></li>
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					if ($_SESSION['statut'] === 'admin') {
						echo '<li><a href="admin.php">Administration</a></li>';
						echo '<li><a href="logout.php">Se déconnecter</a></li>';
					} else {
						echo '<li><a href="#">' . $_SESSION['username'] . '</a></li>';
            echo '<li><a href="logout.php">Se déconnecter</a></li>';
					}
				} else {
					echo '<li><a href="login.php">Se connecter</a></li>';
				}
			?>
		</ul>
	</nav>
</header>
