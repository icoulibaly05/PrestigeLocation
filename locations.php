<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>

<h2>Gestion des Locations</h2>
<a href="ajouter_location.php">Ajouter une Location</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Voiture</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT l.id_louer, c.nom, c.prenom, v.marque, v.modele, l.date_debut, l.date_fin
                FROM louer l
                JOIN clients c ON l.id_client = c.id_client
                JOIN voitures v ON l.immatriculation = v.immatriculation";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_louer']}</td>
                        <td>{$row['nom']} {$row['prenom']}</td>
                        <td>{$row['marque']} {$row['modele']}</td>
                        <td>{$row['date_debut']}</td>
                        <td>{$row['date_fin']}</td>
                        <td>
                            <a href='modifier_location.php?id={$row['id_louer']}'>Modifier</a>
                            <a href='supprimer_location.php?id={$row['id_louer']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucune location trouvée</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
