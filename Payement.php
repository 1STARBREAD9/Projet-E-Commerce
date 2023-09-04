<?php
require_once("db.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Page de paiement</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/Paiement.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<?php



require_once("header.php");
$id = $_SESSION['ID_utilisateur'] ?? null;
// if (!$id) {
//     header('Location: Connexion.php');
//     exit;
// }
?>



<body>
    <?php
    // Récupérer l'ID de l'utilisateur depuis la session
    $id = $_SESSION['ID_utilisateur'];

    if (isset($_POST['submit'])) {
        $voiture_id = $_POST['voiture_id'];
        $prix = $_POST['prix'] ?? null;
        $nom = $_POST['nom'] ?? null;

        // Stocker les valeurs dans des variables de session
        $_SESSION['voiture_id'] = $voiture_id;
        $_SESSION['prix'] = $prix;
        $_SESSION['nom'] = $nom;
    }

    // Sortie pour le débogage
    echo "bonjour1";

    if (isset($_POST['envoi'])) {
        // Récupérer les valeurs depuis la session
        $voiture_id = $_SESSION['voiture_id'] ?? null;
        $prix = $_SESSION['prix'] ?? null;
        $nom = $_SESSION['nom'] ?? null;

        // Obtenir la date et l'heure actuelles
        setlocale(LC_TIME, 'fr_FR');
        $date_commande = strftime('%Y-%m-%d %H:%M:%S');

        // Construire et exécuter la requête préparée
        $query = "INSERT INTO historique_commandes (utilisateur_id, prix, nom_voiture, date_commande) VALUES (:id_utilisateur, :prix, :nom, :date_commande)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id_utilisateur', $id);
        $statement->bindParam(':prix', $prix);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':date_commande', $date_commande);
        $statement->execute();
    }
    ?>


    <form action="" method="POST" id="paymentForm">
        <div class="container p-0">
            <div class="card px-4">
                <p class="h8 py-3">Payment Details</p>
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Person Name</p>
                            <input class="form-control mb-3" type="text" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Card Number</p>
                            <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                        </div>
                    </div>
                    <span class="ps-3">Somme à payer <?= $_POST['prix'] ?? null ?></span>
                    <span class="fas fa-arrow-right">Voiture <?= $_POST['nom']  ?? null ?></span>
                    <a href="/"><button type="submit" class="bn632-hover bn24" name="envoi">Valider le paiement</button></a>
    </form>
    </div>
    </div>
    </div>
    </div>
    </form>


</body>

</html>