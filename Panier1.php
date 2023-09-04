<?php
include_once "db.php";
?>
<?php
require_once("header.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotrePanier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d7c0f20a09.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='css/Panier1CSS.css'>
</head>

<body>
    <?php
    $id = $_SESSION['ID_utilisateur'] ?? null;

    if ($id && isset($_POST['rajouter'])) {
        $voiture_id = $_POST['voiture_id'];
        $prix = $_POST['prix'];
        $lien_image = $_POST["lien_image"];
        $nom_voiture = $_POST["nom_voiture"];

      

            $sql1 = "INSERT INTO panier (produit_id, utilisateur_id, quantite, prix, lien_img, nom_voiture) VALUES (?, ?, 1, ?, ?, ?)";
            echo $sql1;
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute([$voiture_id, $id, $prix, $lien_image, $nom_voiture]);
        }
    

    $totalPanier = 0;

    $sql = "SELECT * FROM panier WHERE utilisateur_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    // Supprimer l'article
    if (isset($_POST['supprimer'])) {
        $produit_id_supprimer = $_POST['produit_id_supprimer'];
        $sql_supprimer = "DELETE FROM panier WHERE produit_id = ? AND utilisateur_id = ?";
        $stmt_supprimer = $pdo->prepare($sql_supprimer);
        $stmt_supprimer->execute([$produit_id_supprimer, $id]);
        header("Refresh:0");
    }
    // Rajouter produit +
    if (isset($_POST['modifier_quantite_plus'])) {
        $produit_id_modifier = $_POST['produit_id_modifier'];
        $sql_modifier = "UPDATE panier SET quantite = quantite + 1 WHERE produit_id = ? AND utilisateur_id = ?";
        $stmt_modifier = $pdo->prepare($sql_modifier);
        $stmt_modifier->execute([$produit_id_modifier, $id]);
        header("Refresh:0");
    }
    // Soustraire produit -
    if (isset($_POST['modifier_quantite_moins'])) {
        $produit_id_modifier = $_POST['produit_id_modifier'];
        $sql_quantite = "SELECT quantite FROM panier WHERE produit_id = ? AND utilisateur_id = ?";
        $stmt_quantite = $pdo->prepare($sql_quantite);
        $stmt_quantite->execute([$produit_id_modifier, $id]);
        $quantite = $stmt_quantite->fetchColumn();

        if ($quantite > 1) {
            $sql_modifier = "UPDATE panier SET quantite = quantite - 1 WHERE produit_id = ? AND utilisateur_id = ?";
            $stmt_modifier = $pdo->prepare($sql_modifier);
            $stmt_modifier->execute([$produit_id_modifier, $id]);
        } else {
            $sql_supprimer = "DELETE FROM panier WHERE produit_id = ? AND utilisateur_id = ?";
            $stmt_supprimer = $pdo->prepare($sql_supprimer);
            $stmt_supprimer->execute([$produit_id_modifier, $id]);
        }

        header("Refresh:0");
    }
    ?>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-2">
                    <h4>Votre Panier</h4>


                    <?php while ($row = $stmt->fetch()) :
                        $produit_id = $row['produit_id'];
                        $prix = $row['prix'];
                        $quantite = $row['quantite'];
                        $image = $row['lien_img'];
                        $nom = $row['nom_voiture'];

                        $totalPanier += $prix * $quantite;
                    ?>


                        <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                            <div class="mr-1"><img src=" <?= $image ?>" width="70"></div>
                            <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"> <?= $nom ?></span>
                            </div>
                            <div class="d-flex flex-row align-items-center qty">
                                <form method="post" action="">
                                    <input type="hidden" name="produit_id_modifier" value="<?= $produit_id ?>">
                                    <button type="submit" name="modifier_quantite_moins" class="btn btn-minus text-danger"><i class="fa fa-minus"></i></button>
                                </form>
                                <h5 class="text-grey mt-1 mr-1 ml-1"><?= $quantite ?></h5>
                                <form method="post" action="">
                                    <input type="hidden" name="produit_id_modifier" value="<?= $produit_id ?>">
                                    <button type="submit" name="modifier_quantite_plus" class="btn btn-plus text-success"><i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                            <div>
                                <h5 class="text-grey"><?= $prix ?></h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <form method="post" action="">
                                    <input type="hidden" name="produit_id_supprimer" value="<?= $produit_id ?>">
                                    <button type="submit" name="supprimer" class="btn btn-trash mb-1 text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div>
                    <div class="d-flex justify-content-end mt-3">
                        <h5 class="font-weight-bold">Total: <?= $totalPanier ?>$</h5>
                    </div>
                    <?php if (!$id) {
                        echo '<div class="container mt-5 mb-5">';
                        echo '<div class="alert alert-warning">Vous n\'êtes pas connecté.';
                        echo '</div>';
                    } else
                    ?>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                        <?php if ($id) { ?>
                            <a href="Livraison.php" class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceder au paiement</a>
                        <?php } ?>
                        <?php if ($id) { ?>
                            <a href="boutique.php" class="btnacc">Revenir à la boutique</a>
                        <?php } ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>

<?php
require_once("footer.php");



?>