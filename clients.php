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
            <th>Type de Client</th> <!-- Nouvelle colonne pour le type de client -->
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT clients.id_client, clients.nom, clients.prenom, clients.adresse, typesclient.type_client, clients.photo 
                FROM clients 
                JOIN typesclient ON clients.id_type_client = typesclient.id_type_client";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_client'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['adresse'] . "</td>";
                echo "<td>" . $row['type_client'] . "</td>"; // Affichage du type de client
                echo "<td><img src='images/" . $row['photo'] . "' alt='Photo du client' width='100' class='clickable'></td>";
                echo "<td>";
                echo "<a href='modifier_client.php?id=" . $row['id_client'] . "'>Modifier</a> ";
                echo "<a href='supprimer_client.php?id=" . $row['id_client'] . "'>Supprimer</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Aucun client trouvé</td></tr>"; // Mise à jour du colspan
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
