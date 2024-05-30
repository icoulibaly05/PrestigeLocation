<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>
 
<h2>Ajouter une Voiture</h2>
<form action="ajouter_voiture.php" method="post" enctype="multipart/form-data">
<label for="immatriculation">Immatriculation:</label>
<input type="text" id="immatriculation" name="immatriculation" required>
<label for="marque">Marque:</label>
<input type="text" id="marque" name="marque" required>
<label for="modele">Modèle:</label>
<input type="text" id="modele" name="modele" required>
<label for="id_categorie">Catégorie:</label>
<select id="id_categorie" name="id_categorie" required>
<?php
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_categorie']}'>{$row['categorie']}</option>";
        }
        ?>
</select>
<label for="image">Image:</label>
<input type="file" id="image" name="image" accept="image/*" required>
<button type="submit" name="submit">Ajouter</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $immatriculation = $_POST['immatriculation'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $id_categorie = $_POST['id_categorie'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);
 
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO voitures (immatriculation, marque, modele, id_categorie, image)
                VALUES ('$immatriculation', '$marque', '$modele', '$id_categorie', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Voiture ajoutée avec succès</p>";
        } else {
            echo "<p>Erreur: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Erreur lors du téléchargement de l'image.</p>";
    }
}
?>
 
<?php include 'templates/footer.php'; ?>