<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>
 
<h2>Ajouter un Client</h2>
<form action="ajouter_client.php" method="post" enctype="multipart/form-data">
<label for="nom">Nom:</label>
<input type="text" id="nom" name="nom" required>
<label for="prenom">Prénom:</label>
<input type="text" id="prenom" name="prenom" required>
<label for="adresse">Adresse:</label>
<input type="text" id="adresse" name="adresse" required>
<label for="photo">Photo:</label>
<input type="file" id="photo" name="photo" accept="image/*" required>
<button type="submit" name="submit">Ajouter</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $photo = $_FILES['photo']['name'];
    $target = "images/" . basename($photo);
 
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
        $sql = "INSERT INTO clients (nom, prenom, adresse, photo)
                VALUES ('$nom', '$prenom', '$adresse', '$photo')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Client ajouté avec succès</p>";
        } else {
            echo "<p>Erreur: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Erreur lors du téléchargement de la photo.</p>";
    }
}
?>
 
<?php include 'templates/footer.php'; ?>