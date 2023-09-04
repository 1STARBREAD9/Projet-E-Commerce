
    <!DOCTYPE html>
    <html>

    <head>
        <script src="jquery-3.6.4.min.js"></script>
        <meta charset="UTF-8">
        <title>Contactez-nous</title>
        <link rel="stylesheet" type="text/css" href="css/contact-css.css">
      

    </head>

    <body>

        <?php
        require_once('header.php')
        ?>

        <header>
            <h1>Contactez-nous</h1>
        </header>
        <div class="container">
            <form action="sendmail.php" method="post" id="my-form">
                <label for="first name">Prénom :</label>
                <input type="text" name="prenom" id="prenom" required>

                <label for="last name">Nom :</label>
                <input type="text" name="nom" id="nom" required>

                <label for="email">Email :</label>
                <input type="email" name="mail" id="mail" required>

                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>

                <br>
                <p style=" color:white; font-weight : bold" id="my-form-status"></p> </br>
                <input type="submit" name="envoyer" id="my-form-button" value="Envoyer">

            </form>
        </div>

    </body>
    </html>