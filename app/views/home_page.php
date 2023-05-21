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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Aggiungi">
  <meta property="og:type" content="website">
  <style>
    .u-body,
    body.u-xl-mode {
      overflow-y: hidden !important;
      height: 100vh;
    }

    h2 a {
      color: #478ac9 !important;
      cursor: pointer;
    }

    /* INIZIO MODAL */
    .modal {
      display: none;
      align-items: center;
      justify-content: center;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      text-align: center;
    }

    .modal-content a {
      display: block;
      margin: 10px auto;
      width: fit-content;
    }

    #logout:hover {
      background-color: #db545a !important;
      color: white !important;
      border-color: #db545a !important;
    }

    i {
      margin: 10px;
    }

    .user-info {
      text-align: center;
      margin-bottom: 20px;
    }

    .info-label {
      display: inline-block;
      font-weight: bold;
      margin-right: 5px;
    }

    #annulla {
      background-color: orange !important;
      border-color: orange !important;
      color: white !important;
    }

    .disabled {
      background-color: #ccc !important;
      cursor: not-allowed !important;
    }

    .tooltip-btn {
      position: relative;
    }

    .tooltip-btn::after {
      content: attr(title);
      position: absolute;
      bottom: -20px;
      left: 50%;
      transform: translateX(-50%);
      padding: 5px;
      background-color: #000;
      color: #fff;
      font-size: 12px;
      border-radius: 3px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .tooltip-btn:hover::after {
      opacity: 1;
    }
  </style>
</head>

<body class="u-body u-xl-mode" data-lang="it">
  <div id="modal" class="modal">
    <div class="modal-content">
      <h2 id="title-modal" style="text-align: center;">Profilo utente</h2>
      <div class="user-info">
        <p><span class="info-label">Nome:</span> <span id="user-name"><?= $_SESSION['nome'] ?></span></p>
        <p><span class="info-label">Cognome:</span> <span id="user-surname"><?= $_SESSION['cognome'] ?></span></p>
        <p><span class="info-label">Email:</span> <span id="user-email"><?= $_SESSION['email'] ?></span></p>
        <p><span class="info-label">Ruolo:</span> <span id="user-role"><?= $_SESSION['role'] === 1 ? "admin" : "Visualizzatore di {$_SESSION['ragione_sociale']}" ?></span></p>
      </div>
      <a class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="logout">Logout<i class="fa-solid fa-right-from-bracket"></i></a>

      <a class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="annulla">Annulla</a>

    </div>
  </div>
  <section class="u-align-center u-clearfix u-white u-section-1" id="carousel_617b">
    <img class="u-expanded-width u-image u-image-default u-image-1" src="images/gh4.jpg" alt="" data-image-width="1440" data-image-height="1080">
    <a href="visualizza" class="u-border-2 u-border-custom-color-1 u-btn u-button-style u-hover-custom-color-1 u-none u-text-hover-white u-btn-1">Visualizza&nbsp;<br>valutazioni
    </a>
    <a href="aggiungiValutazione" <?= $_SESSION['role'] === 0 ? "title='Non hai i permessi per effettuare questa operazione'" : "" ?>class="u-border-2 u-border-custom-color-1 u-btn u-button-style u-hover-custom-color-1 u-none u-text-hover-white u-btn-2 <?= $_SESSION['role'] === 0 ? "disabled tooltip-btn" : "" ?>" id="aggiungi">Aggiungi&nbsp;<br>valutazione
    </a>
    <h2 class="u-align-center u-text u-text-default u-text-1">Benvenuto <a class="name"><?= $_SESSION['nome'] . " " . $_SESSION['cognome'] ?></a>. Cosa vuoi fare?</h2>
    <a href="aggiungiUtente" title="Non hai i permessi per effettuare questa operazione" class="u-border-2 u-border-custom-color-1 u-btn u-button-style u-hover-custom-color-1 u-none u-text-hover-white u-btn-3 <?= $_SESSION['role'] === 0 ? "disabled tooltip-btn" : "" ?> " id="aggiungiUtente">Crea nuovo utente</a>
  </section>
</body>
<script>
  $("#aggiungiUtente").click(function(e) {
    e.preventDefault();
    if ($("#aggiungiUtente").hasClass("disabled"))
      return
    location.href = "creaUtente"
  });
  $("#aggiungi").click(function(e) {
    e.preventDefault();
    if ($("#aggiungi").hasClass("disabled"))
      return
    location.href = "aggiungiValutazione"
  });
  $(".name").click(function(e) {
    e.preventDefault();
    $(".modal").css("display", "block");
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  });
  $("#logout").click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: "logout",
      dataType: "json",
      success: function(response) {
        if (response)
          location.href = "home"
      }
    });
  });
  $("#annulla").click(function(e) {
    e.preventDefault();
    modal.style.display = "none";
  });
  $('.tooltip-btn').on('click', function() {
    e.preventDefault()
    var $tooltip = $('<div class="tooltip">Non hai i permessi per effettuare questa operazione</div>');
    $(this).append($tooltip);

    setTimeout(function() {
      $tooltip.fadeOut(300, function() {
        $(this).remove();
      });
    }, 2000);
  });
</script>

</html>