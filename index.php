<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agile - Conférence</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="assets/logo-agile.svg" alt="">
      </div>
      <div class="demo">
        Démonstrateur
      </div>
    </header>

    <div class="col-12">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card mt-5">
              <div class="card-body">
                <form class="" action="algo.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="bmd-label-floating">Choisir un fichier : </label>
                      <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                      <input type="submit" class=" btn btn-primary" id="exampleInputPassword1">
                    </div>
                </form>
              </div>
            </div>
          </div>

          <?php if(isset($_SESSION['data'])){?>

          <div class="col-6 mt-5">
            <img src="img.jpg" width="100%" height="auto" alt="">
          </div>
          <div class="col-6">
            <div class="card mt-5">
              <div class="card-boyd">
                <div class="col-12">
                  <h1><?php echo $_SESSION['data']['titre'] ?></h1>
                </div>
                <div class="col-12">
                  <h5>Détéction</h5>
                  <?php
                  foreach ($_SESSION['data']['labels'] as $label) {
                    echo "<span style='font-size:15px;margin-left:2px;margin-top:2px' class='badge badge-pill badge-dark'>$label</span>";
                  }

                  ?>

                </div>

                <div class="col-12 mt-5 mb-5">
                  <h5>% de violence</h5>
                  <div class="progress" style="height: 20px;">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $_SESSION['data']['violence'].'%';?>" aria-valuenow="<?php echo $_SESSION['data']['violence'];?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="col-12 mt-5 mb-5">
                  <h5>SEO</h5>
                  <p>
                    <pre><code data-language="html">
<img src="<?php echo str_replace(' ', '_', $_SESSION['data']['titre']).".jpg" ?>" alt="<?php echo $_SESSION['data']['titre'] ?>">
                    </code></pre>
                  </p>
                </div>

              </div>
            </div>
          </div>

        <?php } ?>
        </div>

      </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script src="assets/script.js" charset="utf-8"></script>
  </body>
</html>

<?php
unset($_SESSION['data']);
 ?>
