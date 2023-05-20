<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OscarMMC</title>
    <script src="js/libraries/jQuery/jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow-y: hidden;
        }

        .bg {
            background-image: url("/images/gh4.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        table.main {
            border-collapse: collapse;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        table.main th,
        table.main td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table.main th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table.main tr:hover {
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
        }


        .small-cell {
            width: 20px;
            /* Adjust the width as per your preference */
            text-align: center;
        }

        i:hover {
            cursor: pointer;
        }

        #aggiungi {
            display: block !important;
            text-align: center !important;
            margin-top: 20px !important;
            text-decoration: none !important;
            font-weight: bold !important;
            width: fit-content !important;
        }

        .prova {
            display: flex;
            justify-content: center;
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

        #annulla {
            background-color: orange !important;
            border-color: orange !important;
            color: white !important;
        }

        #elimina:hover {
            background-color: #db545a !important;
            color: white !important;
            border-color: #db545a !important;
        }

        .alert {
            padding: 15px;
            border-radius: 4px;
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            text-align: center;
            width: fit-content;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        .hidden {
            display: none;
        }

        #myInput {
            margin: 10px;
            min-width: 300px;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            font-weight: normal;
        }

        /* FINE MODAL */
        .cerca {
            display: flex;
            justify-content: center;
        }

        .check {
            padding: 0 !important;
            margin: 0 !important;
            width: auto !important;
        }

        .oscar:hover {
            cursor: pointer;
        }

        .cerca i {
            font-size: 40px;
        }
        .main i{
            font-size: 25px;
        }

        a:hover {
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2 id="title-modal" style="text-align: center;">TITLE MODAL</h2>
            <a class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="elimina">Elimina</a>
            <a class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="annulla">Annulla</a>
        </div>
    </div>
    <?php
    $max = date("Y-m-d");
    if (!isset($_SESSION['id_utente']))
        header("Location: login");
    if ($ragione)
        echo "<h1>Stai visualizzando tutte le valutazioni di $ragione</h1>";
    elseif ($autore) {
        $userModel->setId($autore);
        echo "<h1>Stai visualizzando tutte le valutazioni effettuate da {$userModel->getById()}</h1>";
    } else {
        echo "<h1>Stai visualizzando tutte le valutazioni</h1>";
    }
    if (isset($_GET['ve'])) {
        echo "<h3 class='alert'>Valutazione eliminata con successo</h3>";
    }
    if (isset($_GET['va'])) {
        echo "<h3 class='alert'>Valutazione aggiunta con successo</h3>";
    }
    if (isset($_GET['me'])) {
        echo "<h3 class='alert'>Valutazione modificata con successo</h3>";
    } ?>
    <div class="cerca">
        <table>
            <th> <input class="ragione" type="text" id="myInput" placeholder="Cerca per ragione sociale">
            </th>
            <th> <input class="autore" type="text" id="myInput" placeholder="Cerca per autore valutazione">
            </th>
            <th> <input class="data" type="text" id="myInput" onfocus="(this.type='date')" placeholder="Cerca per data emissione" max="<?=$max ?>">
            </th>
            <th><i class="fa-solid fa-delete-left"></i></th>
        </table>

    </div>

    <?php
    echo "<table class='main'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Id valutazione</th>";
    echo "<th>Autore valutazione</th>";
    echo "<th>Ragione Sociale</th>";
    echo "<th>Data emissione</th>";
    echo "<th>Validità</th>";
    echo "<th>Scarica documento</th>";
    echo "<th>Modifica documento</th>";
    echo "<th>Elimina documento</th>";
    echo "</tr>";
    echo "</thead>";
    foreach ($info as $row) {
        echo "<tbody>";
        echo "<tr>";
        $counter = 0;
        foreach ($row as $value) {
            if ($counter === 0)
                $id = $value;
            if ($counter === 1) {
                $userModel->setId($value);
                echo "<td><a class='ranica'>{$userModel->getById($value)}</a></td>";
            } elseif ($counter === 2) {
                echo "<td><a class='oscar'>{$value}</a></td>";
            } elseif ($counter === 3) {
                echo "<td><a class='mapelli'>{$value}</a></td>";
            } elseif ($counter === 4) {
                $value = $value === 0 ? 'Non valido' : "Valido";
                echo "<td>{$value}</a></td>";
            } else {
                echo "<td>{$value}</td>";
            }
            $counter++;
        }
        echo "<td onclick='redirect($id)' class='small-cell'><i class='fa-solid fa-file-pdf'></i></td>";
        echo "<td onclick='modify($id)' class='small-cell'><i class='fa-solid fa-pencil'></i></td>";
        echo "<td onclick='elimina($id)' class='small-cell'><i class='fa-solid fa-trash'></i></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <div class="prova">
        <a href="home" class="u-active-palette-3-base u-border-5 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-3-base u-palette-2-base u-radius-10 u-btn-1" id="aggiungi">Torna alla home</a>
    </div>
    <div class="bg"></div>
    <footer>

    </footer>
</body>

<script>
    function redirect(value) {
        window.open("pdf?id=" + value, '_black').focus()
    }

    function filterTable() {
        var searchText1 = $('.ragione').val().toLowerCase();
        var searchText2 = $('.autore').val().toLowerCase();
        var searchText3 = $('.data').val().toLowerCase();

        // Loop through each row in the table body
        $('.main tbody tr').each(function() {
            var cellText1 = $(this).find('td:eq(2)').text().toLowerCase();
            var cellText2 = $(this).find('td:eq(1)').text().toLowerCase();
            var cellText3 = $(this).find('td:eq(3)').text().toLowerCase();

            // Show or hide the row based on the search text
            if (
                (cellText1.startsWith(searchText1) || searchText1 === '') &&
                (cellText2.startsWith(searchText2) || searchText2 === '') &&
                (cellText3.startsWith(searchText3) || searchText3 === '')
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    $(document).ready(function() {
        // Bind the input event handler to the .ragione input
        $(".ragione").on("input", function(e) {
            e.preventDefault();
            filterTable.call(this, 2); // Use call() to set the correct context
        });
        $(".autore").on("input", function(e) {
            e.preventDefault();
            filterTable.call(this, 1); // Use call() to set the correct context
        });

        $(".data").on("input", function(e) {
            e.preventDefault();
            filterTable.call(this, 3); // Use call() to set the correct context
        });
        // Bind the click event handler to the .oscar link
        $(".oscar").click(function(e) {
            e.preventDefault();
            var value = $(this).closest('tr').find('td:eq(2)').text();
            $('.ragione').val(value);
            filterTable.call($('.ragione')[0], 2); // Use call() to set the correct context
        });
        $(".ranica").click(function(e) {
            e.preventDefault();
            var value = $(this).closest('tr').find('td:eq(1)').text();
            $('.autore').val(value);
            filterTable.call($('.autore')[0], 1);

        });
        $(".mapelli").click(function(e) {
            e.preventDefault();
            var value = $(this).closest('tr').find('td:eq(3)').text();
            $('.data').val(value);
            filterTable.call($('.data')[0], 3);

        });
    });

    function elimina(value) {
        var modal = document.getElementById("modal");

        modal.style.display = "flex";
        $("#title-modal").html("Eliminare valutazione id:" + value + "?");

        $("#annulla").click(function(e) {
            e.preventDefault();
            modal.style.display = "none";
        });
        $("#elimina").click(function(e) {
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: "deleteEvaluation",
                data: {
                    id: value
                },
                dataType: "json",
                success: function(response) {
                    location.href = "visualizza?ve"
                }
            });

        });

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }



    function modify(value) {
        window.open('modifica?id=' + value, '_black').focus()
    }
    setTimeout(function() {
        $('.alert').addClass('hidden');
    }, 3000);

    $(".cerca i").click(function(e) {
        $("input").val("");
        $(".ragione").trigger("input");
    });
</script>

</html>