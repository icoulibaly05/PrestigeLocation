<?php
include 'config.php';
include 'templates/header.php';
?>

<h2>Gestion des Clients</h2>
<a href="ajouter_client.php">Ajouter un Client</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_client']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['prenom']}</td>
                        <td>{$row['adresse']}</td>
                        <td><img src='images/{$row['photo']}' alt='Photo du client' width='100'></td>
                        <td>
                            <a href='modifier_client.php?id={$row['id_client']}'>Modifier</a>
                            <a href='supprimer_client.php?id={$row['id_client']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
        } else {
            echo"<tr><td colspan='6'>Aucun client trouvé</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
