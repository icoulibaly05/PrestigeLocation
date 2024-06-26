<?php
include 'config.php';
 
$sql = "SELECT louer.id_louer, louer.date_debut, louer.date_fin, voitures.marque, voitures.modele, clients.nom, clients.prenom
        FROM louer
        JOIN voitures ON louer.immatriculation = voitures.immatriculation
        JOIN clients ON louer.id_client = clients.id_client";
$result = $conn->query($sql);
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $id_client = $_POST['id_client'];
        $immatriculation = $_POST['immatriculation'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $compteur_debut = $_POST['compteur_debut'];
        $compteur_fin = $_POST['compteur_fin'];
 
        $sql = "INSERT INTO louer (id_client, immatriculation, date_debut, date_fin, compteur_debut, compteur_fin) VALUES ('$id_client', '$immatriculation', '$date_debut', '$date_fin', '$compteur_debut', '$compteur_fin')";
        $conn->query($sql);
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nos Réservations</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="bg-dark text-white text-center py-3">
<h1>Nos Réservations</h1>
<nav class="nav justify-content-center">
<a class="nav-link text-white" href="index.php">Accueil</a>
<a class="nav-link text-white" href="voitures.php">Voitures</a>
<a class="nav-link text-white" href="clients.php">Clients</a>
<a class="nav-link text-white" href="reservations.php">Réservations</a>
</nav>
</header>
<main class="container my-5">
<h2>Liste des réservations</h2>
<div class="row">
<?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Réservation ID : " . $row["id_louer"] . "</h5>";
                    echo "<p class='card-text'>Client : " . $row["nom"] . " " . $row["prenom"] . "</p>";
                    echo "<p class='card-text'>Voiture : " . $row["marque"] . " " . $row["modele"] . "</p>";
                    echo "<p class='card-text'>Date de début : " . $row["date_debut"] . "</p>";
                    echo "<p class='card-text'>Date de fin : " . $row["date_fin"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>0 résultats</p>";
            }
            ?>
</div>
<h2>Ajouter une nouvelle réservation</h2>
<form method="POST" action="reservations.php">
<input type="hidden" name="add">
<div class="form-group">
<label for="id_client">ID Client</label>
<input type="number" class="form-control" name="id_client" required>
</div>
<div class="form-group">
<label for="immatriculation">Immatriculation</label>
<input type="text" class="form-control" name="immatriculation" required>
</div>
<div class="form-group">
<label for="date_debut">Date de début</label>
<input type="date" class="form-control" name="date_debut" required>
</div>
<div class="form-group">
<label for="date_fin">Date de fin</label>
<input type="date" class="form-control" name="date_fin" required>
</div>
<div class="form-group">
<label for="compteur_debut">Compteur de début</label>
<input type="number" class="form-control" name="compteur_debut" required>
</div>
<div class="form-group">
<label for="compteur_fin">Compteur de fin</label>
<input type="number" class="form-control" name="compteur_fin" required>
</div>
<button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</main>
<footer class="bg-dark text-white text-center py-3">
<p>&copy; 2024 Location de Voitures. Tous droits réservés.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>