<?php
require_once("db.php");
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/CSSindex.css'>
  <title>Porsche</title>
</head>

<body>

  <?php
  require_once('header.php')
  ?>

  <section id="acceuil">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="images/Background.mp4" type="video/mp4">
    </video>
    <div class="content">
      <h1>Votre Porsche en 5 minutes</h1>
      <a href="boutique.php" class="btn">Acheter maintenant</a>
    </div>
  </section>

  <?php
  require_once('footer.php')
  ?>

</body>

</html>