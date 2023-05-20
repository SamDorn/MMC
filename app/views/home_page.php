<?php
if (!isset($_SESSION['email'])) {
  header("Location: login");
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="it">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Benvenuto utente">
  <meta name="description" content="">
  <title>OscarMMC</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="css/home_page.css" media="screen">
  <script src="js/libraries/jQuery/jquery-3.6.3.min.js"></script>
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Aggiungi">
  <meta property="og:type" content="website">
  <style>
    .u-body, body.u-xl-mode {
      overflow-y: hidden !important;
      height: 100vh;

    }
  </style>
</head>

<body class="u-body u-xl-mode" data-lang="it">
<section class="u-align-center u-clearfix u-white u-section-1" id="carousel_617b">
      <img class="u-expanded-width u-image u-image-default u-image-1" src="images/gh4.jpg" alt="" data-image-width="1440" data-image-height="1080">
      <a href="visualizza" class="u-border-2 u-border-custom-color-1 u-btn u-button-style u-hover-custom-color-1 u-none u-text-hover-white u-btn-1">Visualizza&nbsp;<br>valutazioni
      </a>
      <a href="aggiungi" class="u-border-2 u-border-custom-color-1 u-btn u-button-style u-hover-custom-color-1 u-none u-text-hover-white u-btn-2">Aggiungi&nbsp;<br>valutazione
      </a>
      <h2 class="u-align-center u-text u-text-default u-text-1">Benvenuto <?= $_SESSION['username']?>. Cosa vuoi fare?</h2>
      <a href="aggiungiUtente" class="u-border-2 u-border-custom-color-1 u-btn u-button-style u-hover-custom-color-1 u-none u-text-hover-white u-btn-3">Crea nuovo utente</a>
    </section>
</body>

</html>