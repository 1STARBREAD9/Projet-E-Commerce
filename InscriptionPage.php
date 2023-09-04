<?php
require_once("db.php");
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageInscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/InscriptionCSS.css">
    <script src="JS/InscriptionJS.js"></script>
</head>

<body>

    <video autoplay loop muted plays-inline class="back-video">
        <source src="images/PorscheInscription.mp4" type="video/mp4">
    </video>
    <a href="index.php"><img src="images/porsche-logo-16.png" class="Logo"></img></a>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="TraitementInscription.php" method="POST" id="inscriptionForm" >
                <h2 class="text-center"><strong>In</strong>scription</h2>
                <div class="form-group">

                    <input class="form-control" type="text" name="Nom" id="Nom" placeholder="Nom">
                    <span class="error-message" id="nom-error"></span>
                    <br>
                    <input class="form-control" type="text" name="Prenom" id="Prenom" placeholder="Prenom">
                    <span class="error-message" id="prenom-error"></span>
                    <br>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                    <span class="error-message" id="email-error"></span>

                    <input class="form-control" type="text" name="password" id="password" placeholder="Mot de passe">
                    <span class="error-message" id="motdepasse-error"></span>

                    <input class="form-control" type="text" name="confirmpassword" id="confirmpassword" placeholder=" Confirmation Mot de passe">
                    <span class="error-message" id="password-error"></span>
                </div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" id="acceptePolitique">J'accepte la politique.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" id="button">S'inscrire</button></div><a href="#" class="already">Vous avez deja un compte? Login ici.</a>
                <a href="mdpoublie.php" class="already">Mot de passe oublié?</a>
            </form>
        </div>
    </div>
<style>
    .error-message {
  color: red;
  font-size: 14px;
  margin-top: 5px;
}
</style>
<script>
// Obtenez l'élément de case à cocher et le formulaire par leur ID
var caseACoche = document.getElementById("acceptePolitique");
var formulaire = document.getElementById("inscriptionForm");

// Ajoutez un gestionnaire d'événement pour la soumission du formulaire
formulaire.addEventListener("submit", function(event) {
    if (!caseACoche.checked) {
        // Empêchez la soumission du formulaire si la case n'est pas cochée
        event.preventDefault();
        alert("Vous devez accepter la politique pour soumettre le formulaire.");
    }
});

</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>







</html>