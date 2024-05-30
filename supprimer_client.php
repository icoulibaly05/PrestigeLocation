<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM clients WHERE id_client = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Client supprimé avec succès</p>";
    } else {
        echo "<p>Erreur lors de la suppression du client : " . $conn->error . "</p>";
    }
}
header("Location: clients.php");
exit();
?>
