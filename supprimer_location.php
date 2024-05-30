<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM louer WHERE id_louer = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Location supprimée avec succès</p>";
    } else {
        echo "<p>Erreur lors de la suppression de la location : " . $conn->error . "</p>";
    }
}
header("Location: locations.php");
exit();
?>
