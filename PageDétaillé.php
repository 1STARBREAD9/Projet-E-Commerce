<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageDetaille</title>
    <link rel="stylesheet" href="css/Pagedetailler.css">
</head>

<body>
<?php
require_once("db.php");
session_start();

$id = $_SESSION['ID_utilisateur'] ?? null;
if (isset($_POST['voir'])) {
    $voiture_id = $_POST['voiture_id'];

    // Récupérer les informations du produit depuis la base de données
    $query = "SELECT * FROM voiture WHERE ID_Voiture = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$voiture_id]);
    $row = $stmt->fetch();
?>
    <h1><?= $row['Nom'] ?></h1>
    <br>

    <?php
    $chemin = 'images/voiture_images/';
    $images = glob($chemin . $voiture_id . '_*.jpg');

    if (!empty($images)) {
        echo '<div class="images">';
        foreach ($images as $image) {
    ?>
            <img src="<?= $image ?>" width="300" class="image-zoom">
    <?php
        }
        echo '</div>';
    }

    // Afficher les caractéristiques moteur
    $query = "SELECT * FROM motorisation WHERE ID_Motorisation = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$voiture_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $Moteur = $row['Moteur'];
    ?>
        <h3>Moteur: <?= $Moteur ?> CH</h3>
    <?php } ?>

    <?php
    // Afficher les caractéristiques énergie
    $query = "SELECT * FROM energie WHERE ID_Energie = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$voiture_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $Energie = $row['Type'];
    ?>
        <h3>Energie utilisée: <?= $Energie ?></h3>
    <?php } ?>

    <?php
    // Afficher les caractéristiques boîte de vitesse
    $query = "SELECT * FROM boite_de_vitesse WHERE ID_Boite = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$voiture_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $Boite = $row['Type'];
    ?>
        <h3>Boite de vitesse: <?= $Boite ?></h3><br>
    <?php } ?>

    <a href="Payement.php" class="btn">Acheter Maintenant</a>
<?php } ?>



    <style>
        .image-zoom {
            transition: transform 0.3s;
        }

        .image-zoom:hover {
            transform: scale(2.2);

        }

        .images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 5px;
            justify-items: center;
            grid-column-gap: 0px;

        }
    </style>





</body>

</html>