<?php
  if(isset($_SESSION['nome']))
    header("Location: home");
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="it">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Benvenuto su OscarMMC">
  <meta name="description" content="">
  <title>OscarMMC</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="css/login_page.css" media="screen">
  <script src="js/libraries/jQuery/jquery-3.6.3.min.js"></script>
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <style>
    body {
      overflow-y: hidden;
    }
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
  <section class="u-align-center u-clearfix u-image u-section-1" id="carousel_5f8e">
      <h2 class="u-align-center u-text u-text-default u-text-1">Benvenuto su OscarMMC</h2>
      <div class="u-form u-radius-20 u-white u-form-1">
        <form id="form" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" source="email" name="form" style="padding: 23px;">
          <h4 class="u-align-center u-form-group u-form-text u-text u-text-2">Accedi alla piattforma</h4>
          <div class="u-form-email u-form-group">
            <label for="name-4c18" class="u-label">Email</label>
            <input type="email" placeholder="Inserisci la tua email" id="email" name="email" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10" required="required">
          </div>
          <div class="u-form-group">
            <label for="email-4c18" class="u-label">Password</label>
            <input placeholder="Inserisci la tua password" id="password" name="password" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10" required="required" type="password">
          </div>
          <div class="alert hidden">Compila tutti i campi</div>
          <div class="u-align-right u-form-group u-form-submit">
            <a id="login" class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1">Login<br>
            </a>
        </form>
      </div>
    </section>

</body>
<script>
  $("#login").click(function(e) {
    var form = document.getElementById("form");
    var requiredFields = form.querySelectorAll("[required]");

    for (var i = 0; i < requiredFields.length; i++) {
      if (requiredFields[i].value === "") {
        if ($(".alert").hasClass("hidden")) {
          $(".alert").removeClass("hidden")
        } else {
          $(".alert").addClass("hidden");
          setTimeout(function() {
            $(".alert").removeClass("hidden");
          }, 500)
        }


        return; // Stop form submission
      }
    }
    $.ajax({
      type: "POST",
      url: "login",
      data: {
        email: $("#email").val(),
        password: $("#password").val()
      },
      dataType: "json",
      success: function(response) {
        if(response != "ok"){
          $(".alert").html("Credenziali errate");
          $(".alert").removeClass("hidden")
        }
        else
          location.href = 'home'
      }
    });
  });
</script>

</html>