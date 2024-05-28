<?php
include 'config.php';
 
$sql = "SELECT id_louer, id_client, date_debut, date_fin, immatriculation FROM louer";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nos Réservations</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Nos Réservations</h1>
<nav>
<ul>
<li><a href="index.html">Accueil</a></li>
<li><a href="voitures.php">Voitures</a></li>
<li><a href="clients.php">Clients</a></li>
<li><a href="reservations.php">Réservations</a></li>
</ul>
</nav>
</header>
<main>
<h2>Liste des réservations</h2>
<div class="reservations">
<?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='reservation'>";
                    echo "<h3>Réservation ID : " . $row["id_louer"] . "</h3>";
                    echo "<p>Client ID : " . $row["id_client"] . "</p>";
                    echo "<p>Date de début : " . $row["date_debut"] . "</p>";
                    echo "<p>Date de fin : " . $row["date_fin"] . "</p>";
                    echo "<p>Immatriculation : " . $row["immatriculation"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 résultats";
            }
            $conn->close();
            ?>
</div>
</main>
<footer>
<p>&copy; 2024 Location de Voitures. Tous droits réservés.</p>
</footer>
</body>
</html>