<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 1)
  header("Location: login");
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="it">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Aggiungi valutazione">
  <meta name="description" content="">
  <title>OscarMMC</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="css/add_page.css" media="screen">
  <script src="js/libraries/jQuery/jquery-3.6.3.min.js"></script>

  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Aggiungi">
  <meta property="og:type" content="website">
  <style>
    .alert {
      padding: 15px;
      border-radius: 4px;
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
      text-align: center;
      width: fit-content;
      margin: 0 auto;
      margin-bottom: 15px;
    }

    .hidden {
      display: none;
    }

    .disabled:hover {
      cursor: not-allowed;
    }
  </style>
</head>

<body class="u-body u-xl-mode" data-lang="it">
  <section class="u-align-center u-clearfix u-image u-section-1" id="carousel_bad6" data-image-width="1440" data-image-height="1080">
    <h2 class="u-align-center u-text u-text-default u-text-1">Aggiungi un utente</h2>
    <div class="u-form u-radius-20 u-white u-form-1">
      <form class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" source="email" name="form" style="padding: 23px;" id="form">
        <div class="u-form-group u-form-select u-form-group-7">
          <label for="select-e411" class="u-label">Tipo di utente</label>
          <div class="u-form-select-wrapper">
            <select id="tipo" name="ruolo" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-7" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value=0>Visualizzatore</option>
              <option value=1>Amministratore</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-group-9">
          <label for="text-4739" class="u-label">Ragione sociale</label>
          <input type="text" placeholder="" id="ragione" name="ragioneSociale" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-9">
        </div>
        <div id="divNome" class="u-form-group u-form-group-1">
          <label for="text-81a7" class="u-label">Nome</label>
          <input type="text" id="nome" placeholder="" name="nome" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-1" required="required">
        </div>
        <div id="divCognome" class="u-form-group u-form-group-1">
          <label for="text-81a7" class="u-label">Cognome</label>
          <input type="text" placeholder="" id="cognome" name="cognome" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-1" required="required">
        </div>
        <div id="divEmail" class="u-form-group u-form-group-1">
          <label for="text-81a7" class="u-label">Email</label>
          <input type="email" placeholder="" id="email" name="email" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-1" required="required">
        </div>
        <div class="u-form-date u-form-group u-form-group-2">
          <label for="date-e23d" class="u-label">Password</label>
          <input type="password" name="password" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-2" required>
        </div>
        <div class="alert hidden">Compila tutti i campi</div>
        <div class="u-align-right u-form-group u-form-submit">
          <a class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="aggiungi">Crea utente</a>
        </div>
      </form>
    </div>
    <a href="home" class="u-active-none u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Torna
      alla home</a>
  </section>
</body>

<script>
  $("#tipo").change(function(e) {
    e.preventDefault();
    if ($("#tipo").val() === "1") {
      $("#ragione").attr("disabled", "disabled");
      $("#ragione").addClass("disabled");
      $("#ragione").val("");
      $("#ragione").removeAttr("required")
    } else {
      $("#ragione").removeAttr("disabled")
      $("#ragione").attr("required", "required");
      $("#ragione").removeClass("disabled");
    }
  });
  $("#aggiungi").click(function(e) {
    e.preventDefault();
    var form = document.getElementById("form");
    var requiredFields = form.querySelectorAll("[required]");

    for (var i = 0; i < requiredFields.length; i++) {
      if (requiredFields[i].value === "") {
        $(".alert").removeClass("hidden");
        return
      }
    }
    var emailField = $("#email");
    var emailValue = emailField.val();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailValue)) {
      // Invalid email format
      $(".alert").removeClass("hidden");
      $(".alert").html("Email non valida");
      return;
    }
    $.ajax({
      type: "POST",
      url: "creaUtente",
      data: $("form").serialize(),
      dataType: "json",
      success: function(response) {
        if (response === "ok")
          location.href = "/home?uc"
        else{
          $(".alert").removeClass("hidden");
          $(".alert").html("C'è stato un problema");
        }
      }
    });
  });
</script>

</html>