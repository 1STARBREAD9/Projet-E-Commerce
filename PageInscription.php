<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/CSSINS.css">
    <script src="JS/InscriptionJS.js"></script>
    <title>Inscription</title>
</head>

<body>


    <form action="TraitementInscription.php" onsubmit="return validatePassword()" method="POST">
        <br><br><br>
        <h2 class="page-header">INSCRIPTION</h2>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <div class="erreur" id="erreur-nom">Le nom doit contenir uniquement des lettres.</div>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <div class="erreur" id="erreur-prenom">Le prénom doit contenir uniquement des lettres.</div>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <div class="erreur" id="erreur-email">L'adresse email n'est pas valide.</div>

        <label for="motdepasse">Mot de passe :</label>
        <input type="text" id="motdepasse" name="motdepasse" required>
        <div class="erreur" id="erreur-motdepasse">Le mot de passe doit contenir au moins 12 caractères dont au moins une lettre minuscule, une lettre majuscule et un chiffre.</div>
        <div id="force"></div>
        <label for="confirmer-motdepasse">Confirmez le mot de passe :</label>
        <input type="text" id="confirmPassword" />
        <div class="erreur" id="erreur-confirmPassword">Le mot de passe n'est pas le meme.</div>
        <button type="submit">S'inscrire</button>
        <span>Vous avez déjà un compte?<a href="Connection.php">Se connecter</a></span>


    </form>

    <script>
        // REGEX 
        const regexNomPrenom = /^[a-zA-Zéèêëîïôöùüç\-]+$/;
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const regexMotDePasse = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{12,}$/;


        // Ici on recuper les ID depuis HTML en creant les variables const 
        const inputNom = document.getElementById('nom');
        const inputPrenom = document.getElementById('prenom');
        const inputEmail = document.getElementById('email');
        const inputMotDePasse = document.getElementById('motdepasse');

        const erreurNom = document.getElementById('erreur-nom');
        const erreurPrenom = document.getElementById('erreur-prenom');
        const erreurEmail = document.getElementById('erreur-email');
        const erreurMotDePasse = document.getElementById('erreur-motdepasse');


        // Ici on une oreillete EventListener qui ecoute les inputs on faisaint une condition et en affichent  le CSS 
        inputNom.addEventListener('input', function() {
            if (!regexNomPrenom.test(inputNom.value)) {
                inputNom.setCustomValidity('invalid');
                erreurNom.style.display = 'block';
            } else {
                inputNom.setCustomValidity('');
                erreurNom.style.display = 'none';
            }
        });

        inputPrenom.addEventListener('input', function() {
            if (!regexNomPrenom.test(inputPrenom.value)) {
                inputPrenom.setCustomValidity('invalid');
                erreurPrenom.style.display = 'block';
            } else {
                inputPrenom.setCustomValidity('');
                erreurPrenom.style.display = 'none';
            }
        });

        inputEmail.addEventListener('input', function() {
            if (!regexEmail.test(inputEmail.value)) {
                inputEmail.setCustomValidity('invalid');
                erreurEmail.style.display = 'block';
            } else {
                inputEmail.setCustomValidity('');
                erreurEmail.style.display = 'none';
            }
        });

        inputMotDePasse.addEventListener('input', function() {
            if (!regexMotDePasse.test(inputMotDePasse.value)) {
                inputMotDePasse.setCustomValidity('invalid');
                erreurMotDePasse.style.display = 'block';
            } else {
                inputMotDePasse.setCustomValidity('');
                erreurMotDePasse.style.display = 'none';
            }
        });

        // Fonction pour calculer la force d'un mot de passe (de 0 à 4)
        function calculerForceMotDePasse(motDePasse) {
            let score = 0;
            if (motDePasse.length >= 12) {
                score++;
            }
            if (/[a-z]/.test(motDePasse)) {
                score++;
            }
            if (/[A-Z]/.test(motDePasse)) {
                score++;
            }
            if (/\d/.test(motDePasse)) {
                score++;
            }
            return score;
        }

        // Récupération des éléments HTML
        const divForce = document.getElementById('force');

        // Ajout d'un écouteur d'événement pour le changement de valeur du mot de passe
        inputMotDePasse.addEventListener('input', function() {
            const force = calculerForceMotDePasse(inputMotDePasse.value);
            divForce.innerHTML = '';
            for (let i = 0; i < force; i++) {
                const div = document.createElement('div');
                div.className = 'force-' + i;
                divForce.appendChild(div);
            }
        });
        
    </script>
</body>

</html>