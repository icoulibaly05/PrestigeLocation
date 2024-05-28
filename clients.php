<?php
include 'config.php';

$sql = "SELECT id_client, nom, prenom, adresse FROM clients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Clients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Nos Clients</h1>
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
        <h2>Liste des clients</h2>
        <div class="clients">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='client'>";
                    echo "<h3>" . $row["nom"] . " " . $row["prenom"] . "</h3>";
                    echo "<p>Adresse : " . $row["adresse"] . "</p>";
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
