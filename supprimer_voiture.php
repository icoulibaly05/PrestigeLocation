<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM voitures WHERE immatriculation = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Voiture supprimée avec succès</p>";
    } else {
        echo "<p>Erreur lors de la suppression de la voiture : " . $conn->error . "</p>";
    }
}
header("Location: voitures.php");
exit();
?>
