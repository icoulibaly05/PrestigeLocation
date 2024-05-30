<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>
 
<h2>Ajouter une Voiture</h2>
<form action="ajouter_voiture.php" method="post">
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
<button type="submit" name="submit">Ajouter</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $immatriculation = $_POST['immatriculation'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $id_categorie = $_POST['id_categorie'];
 
    $sql = "INSERT INTO voitures (immatriculation, marque, modele, id_categorie)
            VALUES ('$immatriculation', '$marque', '$modele', '$id_categorie')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Voiture ajoutée avec succès</p>";
    } else {
        echo "<p>Erreur: " . $conn->error . "</p>";
    }
}
?>
 
<?php include 'templates/footer.php'; ?>
