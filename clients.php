<?php
include 'config.php';

$sql = "SELECT id_client, nom, prenom, adresse FROM clients";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $id_type_client = $_POST['id_type_client'];

        $sql = "INSERT INTO clients (nom, prenom, adresse, id_type_client) VALUES ('$nom', '$prenom', '$adresse', '$id_type_client')";
        $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Clients</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-3">
        <h1>Nos Clients</h1>
        <nav class="nav justify-content-center">
            <a class="nav-link text-white" href="index.php">Accueil</a>
            <a class="nav-link text-white" href="voitures.php">Voitures</a>
            <a class="nav-link text-white" href="clients.php">Clients</a>
            <a class="nav-link text-white" href="reservations.php">Réservations</a>
        </nav>
    </header>
    <main class="container my-5">
        <h2>Liste des clients</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card'>";
                    echo "<img src='clients/" . $row["id_client"] . ".jpg' class='card-img-top' alt='" . $row["nom"] . " " . $row["prenom"] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row["nom"] . " " . $row["prenom"] . "</h5>";
                    echo "<p class='card-text'>Adresse : " . $row["adresse"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>0 résultats</p>";
            }
            ?>
        </div>
        <h2>Ajouter un nouveau client</h2>
        <form method="POST" action="clients.php">
            <input type="hidden" name="add">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="id_type_client">Type de Client</label>
                <input type="text" class="form-control" name="id_type_client" required>
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
