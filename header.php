<!DOCTYPE html>
<html lang="fr">

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF8">
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      box-sizing: border-box;

    }

    .navigation {
      width: 100%;
      height: 90px;
      position: fixed;
      padding: 0 5%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: top 0.3s;
      top: 0;
    }


    .navigation {
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      padding: 5px 8%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 1000;
    }

    nav .logo {
      width: 100px;
    }

    nav ul li {
      list-style: none;
      display: inline-block;
      margin-left: 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: #fff;
      font-size: 17px;
      position: relative;
    }

    li img {
      padding-top: 25px;
      width: 40px;
      display: flex;
      justify-content: center;
      transition: all 0.3s ease;
    }

    li img:hover {
      transform: translateY(-8px);
    }

    form {
      list-style: none;
      display: inline-block;
    }

    span {
      padding-left: 40px;

    }

    .hide-header {
      display: none;
    }
  </style>
</head>

<body>
  <nav class="navigation">
    <a href="index.php"><img src="images/porsche-logo-16.png" class="logo"></a>
    <ul>
      <li><a href="Panier1.php"><img src="images/panier.png"></a></li>

      <li><a href="Connexion.php"><img src="images/ConnectLogo.png"></a></li>
      <?php
      // Vérifier si l'utilisateur est connecté
      session_start();


      if (isset($_SESSION['ID_utilisateur'])) : ?>

        <!-- // Afficher le bouton de déconnexion  -->
        <form action="deconnexion.php" method="POST">
          <ul>
            <li> <input onclick="this.form.submit()" type="image" img src="images/deconnexion.png" width="35px"></input> </li>
          </ul>
        </form>
        <span style='color:white;'>Bonjour, <?= $_SESSION['Nom'] ?> </span>
      <?php endif; ?>
    </ul>
  </nav>
</body>

</html>
<script>
  // JavaScript pour cacher l'en-tête dès le début du défilement
  var header = document.querySelector('.navigation');

  window.addEventListener('scroll', function() {
    var scrollPosition = window.pageYOffset;

    if (scrollPosition > 0) {
      header.classList.add('hide-header');
    } else {
      header.classList.remove('hide-header');
    }
  });
</script>