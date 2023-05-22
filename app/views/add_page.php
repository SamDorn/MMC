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
  </style>
</head>

<body class="u-body u-xl-mode" data-lang="it">
  <section class="u-align-center u-clearfix u-image u-section-1" id="carousel_bad6" data-image-width="1440" data-image-height="1080">
    <h2 class="u-align-center u-text u-text-default u-text-1">Aggiungi valutazione</h2>
    <div class="u-form u-radius-20 u-white u-form-1">
      <form class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" source="email" name="form" style="padding: 23px;" id="form">
        <div class="u-form-group u-form-group-1">
          <label for="text-81a7" class="u-label">Ragione sociale</label>
          <input type="text" placeholder="" id="text-81a7" name="ragioneSociale" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-1" required="required">
        </div>
        <div class="u-form-date u-form-group u-form-group-2">
          <label for="date-e23d" class="u-label">Data emissione</label>
          <input type="date" placeholder="DD/MM/YYYY" id="date-e23d" name="data" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-2" required="" data-date-format="dd/mm/yyyy" max="<?= date("Y-m-d") ?>">
        </div>
        <div class="u-form-group u-form-group-9">
          <label for="text-4739" class="u-label">Peso</label>
          <input type="number" placeholder="" min="3" max="100" id="peso" name="peso" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-9" required="required">
        </div>
        <div class="u-form-group u-form-select u-form-group-7">
          <label for="select-e411" class="u-label">Altezza da terra delle mani all'inizio del sollevamento</label>
          <div class="u-form-select-wrapper">
            <select id="select-e411" name="altezza" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-7" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="0">0 cm</option>
              <option value="25">25 cm</option>
              <option value="50">50 cm</option>
              <option value="75">75 cm</option>
              <option value="100">100 cm</option>
              <option value="125">125 cm</option>
              <option value="150">150 cm</option>
              <option value="176">> 175 cm</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-select u-form-group-7">
          <label for="select-e411" class="u-label">Distanza verticale di spostamento del peso fra inizio e fine sollevamento</label>
          <div class="u-form-select-wrapper">
            <select id="select-e411" name="distanzaVerticale" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-7" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="25">25 cm</option>
              <option value="30">30 cm</option>
              <option value="40">40 cm</option>
              <option value="50">50 cm</option>
              <option value="70">70 cm</option>
              <option value="100">100 cm</option>
              <option value="150">150 cm</option>
              <option value="176">> 175 cm</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-select u-form-group-7">
          <label for="select-e411" class="u-label">Distanza orizzontale tra mani e punto di mezzo delle caviglie</label>
          <div class="u-form-select-wrapper">
            <select id="select-e411" name="distanzaOrizzontale" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-7" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="25">25 cm</option>
              <option value="30">30 cm</option>
              <option value="40">40 cm</option>
              <option value="50">50 cm</option>
              <option value="55">55 cm</option>
              <option value="60">60 cm</option>
              <option value="64">> 63 cm</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-select u-form-group-7">
          <label for="select-e411" class="u-label">Dislocazione angolare del peso in gradi</label>
          <div class="u-form-select-wrapper">
            <select id="select-e411" name="dislocazioneAngolare" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-7" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="0">0°</option>
              <option value="30">30°</option>
              <option value="60">60°</option>
              <option value="90">90°</option>
              <option value="120">120°</option>
              <option value="135">135°</option>
              <option value="136">> 135°</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-select u-form-group-7">
          <label for="select-e411" class="u-label">Giudizio sulla presa del carico</label>
          <div class="u-form-select-wrapper">
            <select id="select-e411" name="giudizio" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-7" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="Buono">Buono</option>
              <option value="Scarso">Scarso</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-select u-form-group-8">
          <label for="select-bebc" class="u-label">Frequenza dei gesti</label>
          <div class="u-form-select-wrapper">
            <select id="select-bebc" name="frequenza" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-8" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="0.2">0.2 gesti/minuto</option>
              <option value="1">1 gesti/minuto</option>
              <option value="4">4 gesti/minuto</option>
              <option value="6">6 gesti/minuto</option>
              <option value="9">9 gesti/minuto</option>
              <option value="12">12 gesti/minuto</option>
              <option value="15">> 15 gesti/minuto</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-select u-form-group-8">
          <div class="u-form-select-wrapper">
            <select id="select-bebc" name="oraFrequenza" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-8" required="required">
              <option value="Seleziona" selected disabled hidden>Seleziona</option>
              <option value="< 1 ora">
                < 1 ora</option>
              <option value="da 1 a 2 ore">da 1 a 2 ore</option>
              <option value="da 2 a 8 ore">da 2 a 8 ore</option>
            </select>
            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
              <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
            </svg>
          </div>
        </div>
        <div class="u-form-group u-form-group-9">
          <label for="text-4739" class="u-label">Costo</label>
          <input type="number" placeholder="" min="0" max="1000" id="text-4739" name="costo" id="costo" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10 u-input-9" required="required">
        </div>
        <div class="u-form-checkbox u-form-group u-form-group-10">
          <input type="checkbox" id="checkbox-1ab1" name="unaMano" value="On" required="required">
          <label for="checkbox-1ab1" class="u-label">Sollevamento con una sola mano?</label>
        </div>
        <div class="u-form-checkbox u-form-group u-form-group-11">
          <input type="checkbox" id="checkbox-76be" name="duePersone" value="On" required="required">
          <label for="checkbox-76be" class="u-label">Sollevamento fatto da due persone?</label>
        </div>

        <div class="alert hidden" id="compila">Compila tutti i campi</div>
        <div class="alert hidden" id="nonValido">Alcuni valori non sono validi</div>
        <div class="u-align-right u-form-group u-form-submit">
          <a class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="aggiungi">Aggiungi</a>
          <input type="submit" value="submit" class="u-form-control-hidden">
        </div>
      </form>
    </div>
    <a href="home" class="u-active-none u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-bottom-left-radius-0 u-bottom-right-radius-0 u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-top-left-radius-0 u-top-right-radius-0 u-btn-2">Torna
      alla home</a>
  </section>
</body>

<script>
  $("#aggiungi").click(function(e) {
    var form = document.getElementById("form");
    var requiredFields = form.querySelectorAll("[required]");

    for (var i = 0; i < requiredFields.length; i++) {
      if (requiredFields[i].value === "") {
        if ($("#compila").hasClass("hidden")) {
          $("#compila").removeClass("hidden")
        } else {
          $("#compila").addClass("hidden");
          setTimeout(function() {
            $("#compila").removeClass("hidden");
          }, 500)
        }


        return; // Stop form submission
      }
    }
    if ($("#costo").val() < 0 || $("#costo").val() > 1000) {

      $("#nonValido").removeClass("hidden");
      return
    }
    if ($("#peso").val() < 3 || $("#peso").val() > 1000) {

      $("#nonValido").removeClass("hidden");
      return
    }
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "addEvaluation",
      data: $("form").serialize(),
      dataType: "json",
      success: function(response) {
        if (response == "ok") {
          location.href = "visualizza?va"
        }
      }
    });
  });
  $('input[type="number"]').keypress(function(event) {
    var keyCode = event.which ? event.which : event.keyCode;
    var isValid = (keyCode >= 48 && keyCode <= 57) || // Allow numbers
      keyCode === 8 || // Allow backspace
      keyCode === 9 || // Allow tab
      keyCode === 37 || // Allow left arrow
      keyCode === 39 || // Allow right arrow
      keyCode === 46; // Allow delete
    if (!isValid) {
      event.preventDefault();
    }
  });
</script>

</html>