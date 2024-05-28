<?php
include 'config.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $immatriculation = $_POST['immatriculation'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $image = $_POST['image'];
        $compteur = $_POST['compteur'];
        $id_categorie = $_POST['id_categorie'];
 
        $sql = "INSERT INTO voitures (immatriculation, marque, modele, image, compteur, id_categorie) VALUES ('$immatriculation', '$marque', '$modele', '$image', '$compteur', '$id_categorie')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        $immatriculation = $_POST['immatriculation'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $image = $_POST['image'];
        $compteur = $_POST['compteur'];
        $id_categorie = $_POST['id_categorie'];
 
        $sql = "UPDATE voitures SET marque='$marque', modele='$modele', image='$image', compteur='$compteur', id_categorie='$id_categorie' WHERE immatriculation='$immatriculation'";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $immatriculation = $_POST['immatriculation'];
 
        $sql = "DELETE FROM voitures WHERE immatriculation='$immatriculation'";
        $conn->query($sql);
    }
}
 
$sql = "SELECT immatriculation, marque, modele, image, compteur, id_categorie FROM voitures";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion des Voitures</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="bg-dark text-white text-center py-3">
<h1>Gestion des Voitures</h1>
<nav class="nav justify-content-center">
<a class="nav-link text-white" href="index.php">Accueil</a>
<a class="nav-link text-white" href="voitures.php">Voitures</a>
<a class="nav-link text-white" href="clients.php">Clients</a>
<a class="nav-link text-white" href="reservations.php">Réservations</a>
</nav>
</header>
<main class="container my-5">
<h2>Ajouter une nouvelle voiture</h2>
<form method="POST" action="gestion_voitures.php">
<input type="hidden" name="add">
<div class="form-group">
<label for="immatriculation">Immatriculation</label>
<input type="text" class="form-control" name="immatriculation" required>
</div>
<div class="form-group">
<label for="marque">Marque</label>
<input type="text" class="form-control" name="marque" required>
</div>
<div class="form-group">
<label for="modele">Modèle</label>
<input type="text" class="form-control" name="modele" required>
</div>
<div class="form-group">
<label for="image">Image (nom de fichier)</label>
<input type="text" class="form-control" name="image" required>
</div>
<div class="form-group">
<label for="compteur">Compteur</label>
<input type="number" class="form-control" name="compteur" required>
</div>
<div class="form-group">
<label for="id_categorie">Catégorie</label>
<input type="text" class="form-control" name="id_categorie" required>
</div>
<button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<h2 class="mt-5">Modifier ou supprimer une voiture existante</h2>
<div class="row">
<?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card'>";
                    echo "<img src='images/" . $row["image"] . "' class='card-img-top' alt='" . $row["marque"] . " " . $row["modele"] . "'>";
                    echo "<div class='card-body'>";
                    echo "<form method='POST' action='gestion_voitures.php'>";
                    echo "<input type='hidden' name='update'>";
                    echo "<div class='form-group'>";
                    echo "<label for='immatriculation'>Immatriculation</label>";
                    echo "<input type='text' class='form-control' name='immatriculation' value='" . $row["immatriculation"] . "' readonly>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='marque'>Marque</label>";
                    echo "<input type='text' class='form-control' name='marque' value='" . $row["marque"] . "'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='modele'>Modèle</label>";
                    echo "<input type='text' class='form-control' name='modele' value='" . $row["modele"] . "'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='image'>Image</label>";
                    echo "<input type='text' class='form-control' name='image' value='" . $row["image"] . "'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='compteur'>Compteur</label>";
                    echo "<input type='number' class='form-control' name='compteur' value='" . $row["compteur"] . "'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='id_categorie'>Catégorie</label>";
                    echo "<input type='text' class='form-control' name='id_categorie' value='" . $row["id_categorie"] . "'>";
                    echo "</div>";
                    echo "<button type='submit' class='btn btn-warning'>Modifier</button>";
                    echo "</form>";
                    echo "<form method='POST' action='gestion_voitures.php' class='mt-2'>";
                    echo "<input type='hidden' name='delete'>";
                    echo "<input type='hidden' name='immatriculation' value='" . $row["immatriculation"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>Supprimer</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>0 résultats</p>";
            }
            $conn->close();
            ?>
</div>
</main>
<footer class="bg-dark text-white text-center py-3">
<p>&copy; 2024 Location de Voitures. Tous droits réservés.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>