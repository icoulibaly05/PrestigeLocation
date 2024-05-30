<?php
include 'config.php';
include 'templates/header.php';
 
if (isset($_GET['id'])) {
    $id_client = $_GET['id'];
 
    // Récupérer les informations actuelles du client
    $sql = "SELECT * FROM clients WHERE id_client = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_client);
    $stmt->execute();
    $result = $stmt->get_result();
    $client = $result->fetch_assoc();
    $stmt->close();
}
?>
 
<h2>Modifier un Client</h2>
<form action="modifier_client.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_client" value="<?php echo $client['id_client']; ?>">
<label for="nom">Nom:</label>
<input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($client['nom'], ENT_QUOTES); ?>" required>
<label for="prenom">Prénom:</label>
<input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($client['prenom'], ENT_QUOTES); ?>" required>
<label for="adresse">Adresse:</label>
<input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($client['adresse'], ENT_QUOTES); ?>" required>
<label for="photo">Photo (laisser vide pour garder l'actuelle):</label>
<input type="file" id="photo" name="photo" accept="image/*">
<button type="submit" name="submit">Modifier</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $id_client = $_POST['id_client'];
    $nom = $conn->real_escape_string($_POST['nom']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $adresse = $conn->real_escape_string($_POST['adresse']);
    $photo = $_FILES['photo']['name'];
 
    if (!empty($photo)) {
        $target = "images/" . basename($photo);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $sql = "UPDATE clients SET nom='$nom', prenom='$prenom', adresse='$adresse', photo='$photo' WHERE id_client='$id_client'";
        } else {
            echo "<p>Erreur lors du téléchargement de la photo.</p>";
            exit();
        }
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