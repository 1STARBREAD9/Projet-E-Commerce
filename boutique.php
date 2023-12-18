<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' type='text/css' media='screen' href='css/boutique.css'> 
</head>

<body>

  <?php
  require_once('db.php'); // Importe le fichier de connexion à la base de données
  require_once("header.php"); // Importe le fichier d'en-tête de la page

  $filtre = "";  
  $tri = "";
  
  if (isset($_POST['filtre'])) { // Vérifie si le formulaire a été soumis
    if (!empty($_POST['color']) || !empty($_POST['boite']) || !empty($_POST['energie'])) {
      $filtre = "WHERE";

      if (!empty($_POST['color'])) {
        $filtre .= " Couleur = '{$_POST['color']}'"; // Ajoute une condition de filtre pour la couleur sélectionnée
      }

      if (!empty($_POST['boite'])) {
        $filtre .= ($filtre === "WHERE" ? "" : " AND") . " Boite = '{$_POST['boite']}'"; // Ajoute une condition de filtre pour la boîte de vitesse sélectionnée
      }

      if (!empty($_POST['energie'])) {
        $filtre .= ($filtre === "WHERE" ? "" : " AND") . " Energie = '{$_POST['energie']}'"; // Ajoute une condition de filtre pour le type d'énergie sélectionné
      }
    }


    //Prix entre  

    if (isset($_POST['prixMin']) && isset($_POST['prixMax'])) {
      $prixMin = filter_var($_POST['prixMin'], FILTER_SANITIZE_NUMBER_FLOAT);
      $prixMax = filter_var($_POST['prixMax'], FILTER_SANITIZE_NUMBER_FLOAT);

      if (!empty($prixMin) && !empty($prixMax)) {
          $conditions[] = " Prix BETWEEN $prixMin AND $prixMax";
      } elseif (!empty($prixMin)) {
          $conditions[] = " Prix >= $prixMin";
      }
  }

  

  //Clause condition


  if (!empty($conditions)) {
      $filtre = " WHERE " . implode(" AND ", $conditions);
  }

  if (isset($_POST['prix'])) {
      if ($_POST['prix'] === "Croissant") {
          $tri = " ORDER BY Prix ASC";
      } elseif ($_POST['prix'] === "Decroissant") {
          $tri = " ORDER BY Prix DESC";
      }
  }
}



  $query = "SELECT * FROM voiture $filtre $tri"; // Construit la requête SQL en fonction des filtres et du tri
  echo $query; // Affiche la requête SQL (à des fins de débogage)
  ?>
  
  <div class="container">
    <form action="" method="post" name="filtre">
      <select id="Couleur" name="color">
        <option value="">Couleur</option>
        <option value="Gris">Gris</option>
        <option value="Blanc">Blanc</option> 
        <option value="Blue">Blue</option>
        <option value="Noir">Noir</option>
      </select>

      <select id="boiteInput" name="boite">
        <option value="">Boite de vitesse</option>
        <option value="Manuelle">Manuelle</option>
        <option value="Automatique">Automatique</option>
      </select>

      <select id="energieInput" name="energie">
        <option value="">Energie</option>
        <option value="Essence">Essence</option>  
        <option value="Diesel">Diesel</option>
        <option value="Électrique">Électrique</option>
      </select>

      <label for="prixMin">Prix minimum :</label>
      <input type="text" id="prixMin" name="prixMin">

      <label for="prixMax">Prix maximum :</label>
      <input type="text" id="prixMax" name="prixMax">

      <select id="triInput" name="prix">
        <option value="Croissant">Prix croissant</option>
        <option value="Decroissant">Prix décroissant</option>
      </select>

      <button type="submit" name="filtre">Filtrer</button>
      <button type="reset"  onclick="resetForm()">Réinitialiser</button>
    </form> 
  </div>
  
  <section class="produit">
    <?php
    // Construire et exécuter la requête SQL
    $stmt = $pdo->query($query);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    ?>
      <div class='product'  id="productDiv">
        <img src=<?= 'images/img_voiture/' . $row['ID_Voiture'] . '.png' ?>> 
        <h3><?= $row['Nom'] ?></h3> 
        <p><?= $row['Prix'] ?>$</p> 
        <form action="Panier1.php" method="post"> 
          <input type="hidden" name="voiture_id" value="<?= $row['ID_Voiture'] ?>">
          <input type="hidden" name="prix" value="<?= $row['Prix'] . "$" ?>">
          <input type="hidden" name="lien_image" value="<?= 'images/img_voiture/' . $row['ID_Voiture'] . '.png' ?>">
          <input type="hidden" name="nom_voiture" value="<?= $row['Nom'] ?>">
          <button type="submit" class="btn" name="rajouter">Ajouter au panier</button>
        </form>
        <form action="DetailPage.php" method="post"  name="detailForm"> 
          <input type="hidden" name="voiture_id" value="<?= $row['ID_Voiture'] ?>">
          <input type="submit" id="hiddenButton" style="display: none;">
        </form>
      </div>
    <?php
    endwhile;
    ?>
  </section>
</body>

</html>
<script>
  // Sélectionnez tous les divs avec la classe "product"
  var productDivs = document.querySelectorAll('.product');

  // Parcourez chaque div et ajoutez l'écouteur d'événement
  productDivs.forEach(function(div) {
    div.addEventListener('click', function() {
      // Trouvez le formulaire à l'intérieur du div actuel
      var form = div.querySelector('form[name="detailForm"]');

      // Vérifiez si un formulaire existe
      if (form) {
        // Soumettez le formulaire
        form.submit();
      }
    });
  });
</script>
<script>
  function resetForm() {
    // Effectuer une redirection vers la page d'origine
    window.location.href = "boutique.php";
  }
</script>
