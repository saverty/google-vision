<?php session_start(); ?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
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
    <section class="result">
      <div class="result">
        <img src="img.jpg" alt="">
      </div>

      <?php if(isset($_SESSION['result'])){?>

        <div class="code">
          <xmp>
            <img src="img.jpg" alt="This image reprensant a(n) <?php echo $_SESSION['result'][0] ?>" title="">
          </xmp>
        </div>
        <?php } ?>

    </section>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script src="assets/script.js" charset="utf-8"></script>
  </body>
</html>
