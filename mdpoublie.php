<!DOCTYPE html>
<html lang="en">
<?php
require_once("db.php");
session_start();
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='css/mpdoublié.css'>
    <title>Document</title>
</head>

<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <?php
                                if (isset($_POST['submit'])) {
                                    // Récupérer l'adresse e-mail depuis le champ input
                                    $email = $_POST['email'];

                                    // Générer un token unique pour la réinitialisation de mot de passe
                                    $token = uniqid();

                                    // Stocker le token dans la base de données avec l'e-mail associé pour une vérification ultérieure

                                    // Envoyer l'e-mail de réinitialisation de mot de passe
                                    $to = $email;
                                    $subject = "Réinitialisation de mot de passe";
                                    $message = "Bonjour,\n\nVeuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe : \n\nhttp://example.com/reset.php?email=" . $email . "&token=" . $token . "\n\nCordialement,\nVotre équipe";
                                    $headers = "From: webmaster@example.com" . "\r\n" .
                                        "Reply-To: webmaster@example.com" . "\r\n" .
                                        "X-Mailer: PHP/" . phpversion();

                                    if (mail($to, $subject, $message, $headers)) {
                                        echo "E-mail de réinitialisation de mot de passe envoyé avec succès ! Veuillez vérifier votre boîte de réception.";
                                    } else {
                                        echo "Erreur lors de l'envoi de l'e-mail de réinitialisation de mot de passe.";
                                    }
                                }
                                ?>

                                <!-- Formulaire d'entrée de l'adresse e-mail -->
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" placeholder="adresse e-mail" class="form-control" type="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="submit" type="submit" class="btn btn-lg btn-primary btn-block" value="Réinitialiser le mot de passe">
                                    </div>
                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








</body>

</html>