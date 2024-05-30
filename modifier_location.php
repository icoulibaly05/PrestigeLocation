<?php
include 'config.php';
include 'templates/header.php';
 
if (isset($_GET['id'])) {
    $id_louer = $_GET['id'];
 
    // Récupérer les informations actuelles de la location
    $sql = "SELECT * FROM louer WHERE id_louer = '$id_louer'";
    $result = $conn->query($sql);
    $location = $result->fetch_assoc();
}
?>
 
<h2>Modifier une Location</h2>
<form action="modifier_location.php" method="post">
<input type="hidden" name="id_louer" value="<?php echo $location['id_louer']; ?>">
<label for="id_client">Client:</label>
<select id="id_client" name="id_client" required>
<?php
        $sql = "SELECT id_client, nom, prenom FROM clients";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $selected = $row['id_client'] == $location['id_client'] ? "selected" : "";
            echo "<option value='{$row['id_client']}' $selected>{$row['nom']} {$row['prenom']}</option>";
        }
        ?>
</select>
<label for="immatriculation">Voiture:</label>
<select id="immatriculation" name="immatriculation" required>
<?php
        $sql = "SELECT immatriculation, marque, modele FROM voitures";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $selected = $row['immatriculation'] == $location['immatriculation'] ? "selected" : "";
            echo "<option value='{$row['immatriculation']}' $selected>{$row['marque']} {$row['modele']}</option>";
        }
        ?>
</select>
<label for="date_debut">Date Début:</label>
<input type="date" id="date_debut" name="date_debut" value="<?php echo $location['date_debut']; ?>" required>
<label for="date_fin">Date Fin:</label>
<input type="date" id="date_fin" name="date_fin" value="<?php echo $location['date_fin']; ?>" required>
<button type="submit" name="submit">Modifier</button>
</form>
 
<?php
if (isset($_POST['submit'])) {
    $id_louer = $_POST['id_louer'];
    $id_client = $_POST['id_client'];
    $immatriculation = $_POST['immatriculation'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
 
    $sql = "UPDATE louer SET id_client='$id_client', immatriculation='$immatriculation', date_debut='$date_debut', date_fin='$date_fin' WHERE id_louer='$id_louer'";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Location modifiée avec succès</p>";
    } else {
        echo "<p>Erreur: " . $conn->error . "</p>";
    }
}
?>
 
<?php include 'templates/footer.php'; ?>