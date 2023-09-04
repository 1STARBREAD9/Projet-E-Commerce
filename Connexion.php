<?php
require_once("db.php");
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ConnexionCSS.css">
    <script src="JS/JSconnexion.js"></script>
</head>

<body>

    <video autoplay loop muted plays-inline class="back-video">
        <source src="images/PorsheVideo.mp4" type="video/mp4">
    </video>
    <a href="index.php"><img src="images/porsche-logo-16.png" class="Logo"></img></a>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="Connexion.php" method="POST">
                <h2 class="text-center"><strong>Se</strong> Connecter.</h2>
                <div class="form-group">
                    <img src="images/mail.png" class="email"></img>
                    <input class="form-control" type="texte" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <img src="images/lock.png" class="password"></img>
                    <img src="images/ShowPassword.png" onclick="pass()" class="pass-icon" id="pass-icon"></img>
                    <input class="form-control" type="password" name="password" id="showpassword" placeholder="Mot de passe">

                </div>
                
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="sumbit">Se connecter</button></div><a href="InscriptionPage.php" class="already">Vous n'avez pas de compte? Sing up ici.</a>
                <a href="mdpoublie.php" class="already">Mot de passe oublié?</a>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

//Connection Methode PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') :




    // Récupérer les valeurs soumises par le formulaire et échapper les caractères spéciaux
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    
    // Construire et exécuter la requête SQL sécurisée
    $query = "CALL Connexion(:email, :mdp)";
    
    try {
        // Préparer la requête
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
    
        // Exécuter la requête
        $stmt->execute();
    
        // Récupérer le résultat
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Vérifier si des résultats ont été trouvés
        if ($stmt->rowCount() > 0) {
            // L'utilisateur existe dans la base de données
            echo "L'utilisateur existe.";
    
            // Stocker les informations de l'utilisateur dans des variables de session
            session_start();
            $_SESSION['Nom'] = $res['Nom'];
            $_SESSION['ID_utilisateur'] = $res['ID_utilisateur'];
    
            // Authentification réussie, rediriger vers la page d'accueil ou faire d'autres actions nécessaires
            header('Location: index.php');
            exit();
        } else {
            // Login ou mot de passe incorrect, afficher une alerte
            echo '<script>alert("Login ou mot de passe incorrect.");</script>';
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    

    
   

endif;



// Fermer la connexion à la base de données
$conn = null; 


require_once("footer.php");


?>