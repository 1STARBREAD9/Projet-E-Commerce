  <?php require_once("db.php");
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Produit</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/DetailPage.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  </head>

  <body>

    <?php
    require_once("header.php");

    $id = $_SESSION['ID_utilisateur'] ?? null;
    if (isset($_POST['voiture_id'])) {
      $voiture_id = $_POST['voiture_id'];

      // Récupérer les informations du produit depuis la base de données
      $query = "SELECT * FROM voiture WHERE ID_Voiture = ?";
      $stmt = $pdo->prepare($query);
      $stmt->execute([$voiture_id]);
      $row = $stmt->fetch();
      echo $row["Lien_img"];





    ?>
      <section class="py-5">
        <div class="container">
          <div class="row gx-5">
            <aside class="col-lg-6">
              <div class="border rounded-4 mb-3 d-flex justify-content-center">
                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-2 main-image" src="<?= $row['Lien_img'] ?>" alt="Image principale">
                </a>
              </div>

              <?php
              $chemin = 'images/voiture_images/';
              $images = glob($chemin . $voiture_id . '_*.jpg');

              if (!empty($images)) {
                echo '<div class="images">';
                foreach ($images as $image) {
              ?>
                  <div class="d-flex justify-content-center mb-3">
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" class="item-thumb">
                      <img style="max-width: 100%; max-height: 100vh; margin: auto width=" 130 height="90" class="rounded-2 thumbnail" src="<?= $image ?>" alt="Image miniature"></img>
                    </a>
                  </div>
              <?php
                }
              }
              ?>
              <div class="d-flex justify-content-center mb-3">
              </div>

            </aside>
            <main class="col-lg-6">
              <div class="ps-lg-3">
                <h4 class="title text-dark">
                  <h3>Modele: <?= $row['Nom'] ?> </h3>
                </h4>
                <div class="d-flex flex-row my-3">
                  <span class="text-success ms-2">En stock</span>
                </div>

                <div class="mb-3">
                  <span class="h5">Prix: <?= $row['Prix'] ?>$</span>

                </div>
                <p>
                  <?= $row['Description'] ?>
                </p>



                <div class="row">
                  <dt class="col-3">Moteur:</dt>
                  <dd class="col-9"><?= $row['Moteur'] ?> Puissance chevaux</dd>

                  <dt class="col-3">Couleur</dt>
                  <dd class="col-9"><?= $row['Couleur'] ?></dd>

                  <dt class="col-3">Energie utilisé</dt>
                  <dd class="col-9"><?= $row['Energie'] ?></dd>

                  <dt class="col-3">Boite de vitesse</dt>
                  <dd class="col-9"><?= $row['Boite'] ?></dd>
                  <dd class="col-3">Mise en circulation</dt>
                  <dd class="col-9"><?= date("d/m/Y", strtotime($row['Mise_Date']))  ?></dd>
                </div>

                <hr/>
                <form action="Payement.php" method="post">
                  <input type="hidden" name="voiture_id" value="<?= $row['ID_Voiture'] ?>">
                  <input type="hidden" name="prix" value="<?= $row['Prix'] . "$" ?>">
                  <input type="hidden" name="nom" value="<?= $row['Nom'] ?>">
                  <button type="submit" class="btn btn-warning shadow-0" name="submit">Acheter maintenant</button>
                </form>
                <a href="boutique.php" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Revenir a la boutique </a>
              </div>
            </main>
          </div>
        </div>
      </section>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var thumbnails = document.querySelectorAll('.thumbnail');
          var mainImage = document.querySelector('.main-image');
          var mainImageSrc = mainImage.getAttribute('src'); // Stocke l'URL de l'image principale

          thumbnails.forEach(function(thumbnail) {
            thumbnail.addEventListener('mouseover', function() {
              var thumbnailSrc = this.getAttribute('src');
              mainImage.setAttribute('src', thumbnailSrc);
            });

            thumbnail.addEventListener('mouseout', function() {
              mainImage.setAttribute('src', mainImageSrc); // Rétablit l'image principale d'origine
            });
          });
        });
      </script>


    <?php
    }
    require_once("footer.php");
    ?>

  </body>

  </html>