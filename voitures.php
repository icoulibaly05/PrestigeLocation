<?php
include 'config.php';
include 'templates/header.php';
?>

<h2>Gestion des Voitures</h2>
<a href="ajouter_voiture.php">Ajouter une Voiture</a>
<table>
    <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Catégorie</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT v.immatriculation, v.marque, v.modele, c.categorie, v.image
                FROM voitures v
                JOIN categories c ON v.id_categorie = c.id_categorie";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['immatriculation']}</td>
                        <td>{$row['marque']}</td>
                        <td>{$row['modele']}</td>
                        <td>{$row['categorie']}</td>
                        <td><img src='images/{$row['image']}' alt='Image de la voiture' width='100'></td>
                        <td>
                            <a href='modifier_voiture.php?id={$row['immatriculation']}'>Modifier</a>
                            <a href='supprimer_voiture.php?id={$row['immatriculation']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucune voiture trouvée</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
