<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yellow Tulip Museum</title>
        <link rel="stylesheet" href="styles.css"> <!-- Collegamento ai file CSS -->
    </head>
    <body>
        <header class="navbar">
            <!-- Intestazione con titolo e menu di navigazione -->
            <h1>Yellow Tulip Museum</h1>
            <nav>
                <ul>
                    <li><a href="exposures.php">Mostre</a></li>
                    <li><a href="tickets.php">Biglietti</a></li>
                    <li><a href="contacts.php">Contatti</a></li>
                    <li><a href="account.php">Profilo</a></li>
                </ul>
            </nav>
        </header>

        <!-- Info museo -->
        <section id="info" style="text-align: center">
            <h2>Benvenuti allo Yellow Tulip Museum!</h2>

            <p>Lo Yellow Tulip Museum è un luogo dove la storia, l'arte e la cultura si fondono per creare un'esperienza unica e coinvolgente per i visitatori di tutte le età. Situato nel cuore pulsante della città di Padova, il nostro museo celebra la ricchezza e la diversità della storia umana attraverso una vasta collezione di reperti, opere d'arte e installazioni interattive.</p>
            <br>
            <p>Fondato nel lontano 2024, lo Yellow Tulip Museum si impegna a preservare, studiare e condividere il patrimonio culturale del mondo. La nostra missione è educare, ispirare e stimolare la curiosità attraverso mostre innovative, programmi educativi ed eventi speciali.</p>
            <br>
            <p>Dal periodo antico alla contemporaneità, esplora le innumerevoli sfaccettature della storia umana attraverso le nostre esibizioni permanenti e temporanee. Dai reperti archeologici alle opere d'arte moderne, ogni visita allo Yellow Tulip Museum è un viaggio attraverso le epoche e le culture.</p>
            <br>
            <p>Vieni a scoprire lo Yellow Tulip Museum e lasciati trasportare dalla bellezza, dall'arte e dalla storia che ci circonda. Siamo ansiosi di accoglierti e di condividere con te la nostra passione per il patrimonio culturale del mondo.</p>
            <br>
            <p>E ricordate, imparare la storia non è mai stato così divertente!!</p>
        </section>

        <!-- Sezione carosello -->
        <?php
            // Abilita la visualizzazione degli errori
            ini_set('display_errors', 1);

        // Parametri di connessione al database
        $server = "localhost"; // Indirizzo del server MySQL (MariaDB)
        $user = "phpmyadmin"; // Nome utente per l'accesso al database
        $pwd = "ciaone11"; // Password per l'accesso al database
        $db = "Museo"; // Nome del database

        // Creazione della connessione
        $conn = new mysqli($server, $user, $pwd, $db);

        // Controllo della connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Query per selezionare le immagini dalla tabella
        $sql = "SELECT ID, Name, Image FROM Images --WHERE Name LIKE 'HomeCarosel%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output delle immagini
            while ($row = $result->fetch_assoc()) {
                // Ottieni l'estensione del file dall'URL
                $extension = pathinfo($row['Name'], PATHINFO_EXTENSION);
                // Determina il tipo MIME in base all'estensione del file

                /*
                switch ($extension) {
                    case 'jpeg':
                    case 'jpg':
                        $mime_type = 'image/jpeg';
                        break;
                    case 'png':
                        $mime_type = 'image/png';
                        break;
                    case 'gif':
                        $mime_type = 'image/gif';
                        break;
                    case 'bmp':
                        $mime_type = 'image/bmp';
                        break;
                    case 'tiff':
                    case 'tif':
                        $mime_type = 'image/tiff';
                        break;
                    case 'svg':
                        $mime_type = 'image/svg';
                        break;
                    default:
                        // Default break...
                        break;
                }
                */

                // Se il tipo MIME non è vuoto, visualizza l'immagine
                echo '<div class="carousel">';
                echo '<div class="carousel-slide">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="' . $row['Name'] . '" />';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Nessuna immagine trovata.";
        }

        echo '<script src="script.js"></script>';

        // Chiusura della connessione
        $conn->close();
        ?>

        <section>
            <h2 style="text-align: center">In evidenza oggi</h2>
            <?php
                // Abilita la visualizzazione degli errori
                ini_set('display_errors', 1);

                // Parametri di connessione al database
                $server = "localhost"; // Indirizzo del server MySQL (MariaDB)
                $user = "phpmyadmin"; // Nome utente per l'accesso al database
                $pwd = "ciaone11"; // Password per l'accesso al database
                $db = "Museo"; // Nome del database

                // Creazione della connessione
                $conn = new mysqli($server, $user, $pwd, $db);

                // Controllo della connessione
                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                // Fetch della lista delle esibizioni dal database
                $sql = "SELECT Name, Image FROM Exhibitions";
                $result = $conn->query($sql);
                $cycle = (((int)$result->num_rows)/2)+1;

                // Controlla se ci sono delle esibizioni
                if ($result->num_rows > 0) {
                    // Ciclo per mostrare a video tutte le esibizioni
                    while ($row = $result->fetch_assoc()) {
                        if ($cycle >= 0){
                            echo '<div class="col-md-4">';
                            echo '<div class="card">';
                            // Mostra l'immagine della mostra
                            $imageData = base64_encode($row['Image']);
                            $src = 'data:image/jpeg;base64,' . $imageData;
                            echo '<img src="' . $src . '" class="card-img-top" alt="' . htmlspecialchars($row['Name']) . '">';
                            echo '<div class="card-body">';
                            // Mostra il nome della mostra
                            echo '<h5 class="card-title">' . htmlspecialchars($row['Name']) . '</h5>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        $cycle--;
                    }
        } else {
            // Se non ci sono esibizioni
            echo "Nessuna esibizione trovata.";
        }

        // Chiusura della connessione
        $conn->close();
        ?>
        </section>

        <!-- Footer -->
        <?php
        include_once("footer.php");
        ?>
    </body>
</html>