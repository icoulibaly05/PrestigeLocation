<?php
include 'config.php';
include 'templates/header.php';
 
if (isset($_GET['id'])) {
    $id_client = $_GET['id'];
 
    // Récupérer les informations actuelles du client
    $sql = "SELECT * FROM clients WHERE id_client = '$id_client'";
    $result = $conn->query($sql);
    $client = $result->fetch_assoc();
}
?>
 
<h2>Modifier un Client</h2>
<form action="modifier_client.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_client" value="<?php echo $client['id_client']; ?>">
<label for="nom">Nom:</label>
<input type="text" id="nom" name="nom" value="<?php echo $client['nom']; ?>" required>
<label for="prenom">Prénom:</label>
<input type="text" id="prenom" name="prenom" value="<?php echo $client['prenom']; ?>" required>
<label for="adresse">Adresse:</label>
<input type="text" id="adresse" name="adresse" value="<?php echo $client['adresse']; ?>" required>
<label for="photo">Photo (laisser vide pour garder l'actuelle):</label>
<input type="file" id="photo" name="photo" accept="image/*">
<button type="submit" name="submit">Modifier</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $id_client = $_POST['id_client'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $photo = $_FILES['photo']['name'];
 
    if (!empty($photo)) {
        $target = "images/" . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        $sql = "UPDATE clients SET nom='$nom', prenom='$prenom', adresse='$adresse', photo='$photo' WHERE id_client='$id_client'";
    } else {
        $sql = "UPDATE clients SET nom='$nom', prenom='$prenom', adresse='$adresse' WHERE id_client='$id_client'";
    }
 
    if ($conn->query($sql) === TRUE) {
        echo "<p>Client modifié avec succès</p>";
    } else {
        echo "<p>Erreur: " . $conn->error . "</p>";
    }
}
?>
 
<?php include 'templates/footer.php'; ?>