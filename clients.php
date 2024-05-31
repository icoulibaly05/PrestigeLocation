<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>
<link rel="stylesheet" type="text/css" href="styles.css">

<div class="button-container">
    <a href="ajouter_client.php" class="button">Ajouter un Client</a>
</div>

<h2>Gestion des Clients</h2>
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
                        <td><img src='images/{$row['photo']}' alt='Photo du client' width='100' class='clickable'></td>
                        <td>
                            <a href='modifier_client.php?id={$row['id_client']}'>Modifier</a>
                            <a href='supprimer_client.php?id={$row['id_client']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucun client trouvé</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
