<?php include 'config.php'; ?>
<?php include 'templates/header.php'; ?>
<link rel="stylesheet" type="text/css" href="styles.css">


<h2>Voitures Disponibles</h2>
<table>
    <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Catégorie</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT v.immatriculation, v.marque, v.modele, c.categorie, v.image
                FROM voitures v
                JOIN categories c ON v.id_categorie = c.id_categorie
                LEFT JOIN louer l ON v.immatriculation = l.immatriculation
                WHERE l.immatriculation IS NULL";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['immatriculation']}</td>
                        <td>{$row['marque']}</td>
                        <td>{$row['modele']}</td>
                        <td>{$row['categorie']}</td>
                        <td><img src='images/{$row['image']}' alt='Image de la voiture' width='100' class='clickable'></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucune voiture disponible</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
