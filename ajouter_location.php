<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>

<?php
$immatriculation = isset($_GET['immatriculation']) ? $_GET['immatriculation'] : '';
$marque = isset($_GET['marque']) ? $_GET['marque'] : '';
$modele = isset($_GET['modele']) ? $_GET['modele'] : '';
?>

<h2>Ajouter une Location</h2>
<form action="ajouter_location.php" method="post">
    <label for="id_client">Client:</label>
    <select id="id_client" name="id_client" required>
        <?php
        $sql = "SELECT id_client, nom, prenom FROM clients";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_client']}'>{$row['nom']} {$row['prenom']}</option>";
        }
        ?>
    </select>
    
    <label for="immatriculation">Voiture:</label>
    <input type="text" id="immatriculation" name="immatriculation" value="<?php echo $immatriculation; ?>" readonly>
    
    <label for="marque">Marque:</label>
    <input type="text" id="marque" name="marque" value="<?php echo $marque; ?>" readonly>
    
    <label for="modele">Modèle:</label>
    <input type="text" id="modele" name="modele" value="<?php echo $modele; ?>" readonly>
    
    <label for="date_debut">Date Début:</label>
    <input type="date" id="date_debut" name="date_debut" required>
    
    <label for="date_fin">Date Fin:</label>
    <input type="date" id="date_fin" name="date_fin" required>
    
    <button type="submit" name="submit">Ajouter</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $id_client = $_POST['id_client'];
    $immatriculation = $_POST['immatriculation'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    $sql = "INSERT INTO louer (id_client, immatriculation, date_debut, date_fin)
            VALUES ('$id_client', '$immatriculation', '$date_debut', '$date_fin')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Location ajoutée avec succès</p>";
    } else {
        echo "<p>Erreur: " . $conn->error . "</p>";
    }
}
?>

<?php include 'templates/footer.php'; ?>
