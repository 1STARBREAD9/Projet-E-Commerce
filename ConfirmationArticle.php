<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>InscriptionReussi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>


    <?php

if (isset($_POST['submit'])) {

    // Récupérer les données du formulaire
    $voiture_id = $_POST['voiture_id'];
    $prix = $_POST['prix'];
    $nom = $_POST['nom'];
    setlocale(LC_TIME, 'fr_FR');
    $date_commande = strftime('%Y-%m-%d %H:%M:%S');
    echo $date_commande;

    // Construire et exécuter la requête préparée
    $query = "INSERT INTO historique_commandes (utilisateur_id, prix, nom_voiture, date_commande) VALUES (:id_utilisateur, :prix, :nom, :date_commande)";
    echo $query;
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_utilisateur', $id);
    $statement->bindParam(':prix', $prix);
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':date_commande', $date_commande);
    $statement->execute();
}
?>




    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="card col-md-4 bg-white shadow-md p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Merci!</h1>
                    <p> Votre compte a été bien crée</p>
                    <button class="btn btn-outline-success"><a href="Connexion.php">Retour</a></button>
                </div>
            </div>
    </body>

</html> 