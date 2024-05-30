<?php
include 'config.php';
include 'templates/header.php';
 
if (isset($_GET['id'])) {
    $immatriculation = $_GET['id'];
 
    // Récupérer les informations actuelles de la voiture
    $sql = "SELECT * FROM voitures WHERE immatriculation = '$immatriculation'";
    $result = $conn->query($sql);
    $voiture = $result->fetch_assoc();
}
?>
 
<h2>Modifier une Voiture</h2>
<form action="modifier_voiture.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="immatriculation" value="<?php echo $voiture['immatriculation']; ?>">
<label for="marque">Marque:</label>
<input type="text" id="marque" name="marque" value="<?php echo $voiture['marque']; ?>" required>
<label for="modele">Modèle:</label>
<input type="text" id="modele" name="modele" value="<?php echo $voiture['modele']; ?>" required>
<label for="id_categorie">Catégorie:</label>
<select id="id_categorie" name="id_categorie" required>
<?php
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $selected = $row['id_categorie'] == $voiture['id_categorie'] ? "selected" : "";
            echo "<option value='{$row['id_categorie']}' $selected>{$row['categorie']}</option>";
        }
        ?>
</select>
<label for="image">Image (laisser vide pour garder l'actuelle):</label>
<input type="file" id="image" name="image" accept="image/*">
<button type="submit" name="submit">Modifier</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $immatriculation = $_POST['immatriculation'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $id_categorie = $_POST['id_categorie'];
    $image = $_FILES['image']['name'];
 
    if (!empty($image)) {
        $target = "images/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE voitures SET marque='$marque', modele='$modele', id_categorie='$id_categorie', image='$image' WHERE immatriculation='$immatriculation'";
    } else {
        $sql = "UPDATE voitures SET marque='$marque', modele='$modele', id_categorie='$id_categorie' WHERE immatriculation='$immatriculation'";
    }
 
    if ($conn->query($sql) === TRUE) {
        echo "<p>Voiture modifiée avec succès</p>";
    } else {
        echo "<p>Erreur: " . $conn->error . "</p>";
    }
}
?>
 
<?php include 'templates/footer.php'; ?>