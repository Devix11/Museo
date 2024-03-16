<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yellow Tulip Museum</title>
        <link rel="stylesheet" href="styles.css"> <!-- Collegamento ai file CSS -->
    </head>
    <body>
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
            $sql = "SELECT ID, Name, Image FROM Images";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output delle immagini
                while ($row = $result->fetch_assoc()) {
                    // Ottieni l'estensione del file dall'URL
                    $extension = pathinfo($row['Image'], PATHINFO_EXTENSION);
                    // Determina il tipo MIME in base all'estensione del file
                    $mime_type = '';
                    echo 'echo of extension: '.$extension;
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

                    // Se il tipo MIME non è vuoto, visualizza l'immagine
                    echo '<div>';
                    if ($mime_type != '') {
                        echo '<img src="data:' . $mime_type . ';base64,' . base64_encode($row['Image']) . '" alt="' . $row['Name'] . '" />';
                    } else {
                        // Gestione di immagini con estensioni non supportate
                        echo 'Immagine non supportata: ' . $row['Name'];
                    }
                    echo '</div>';
                }
            } else {
                echo "Nessuna immagine trovata.";
            }

            // Chiusura della connessione
            $conn->close();
        ?>

        <header>
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

        <!-- Sezione Biglietti -->
        <section id="biglietti">
            <h2>Acquista Biglietti</h2>
            <p>Opzioni e prezzi dei biglietti...</p>
        </section>

        <!-- Sezione Account -->
        <section id="account">
            <h2>Account</h2>
            <div class="account-actions">
                <!-- Modulo di accesso -->
                <div class="login">
                    <h3>Accedi</h3>
                    <form action="" method="post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit">Accedi</button>
                    </form>
                </div>

                <!-- Modulo di registrazione -->
                <div class="register">
                    <h3>Registrati</h3>
                    <form action="" method="post">
                        <label for="new-username">Username:</label>
                        <input type="text" id="new-username" name="username" required>
                        <label for="new-password">Password:</label>
                        <input type="password" id="new-password" name="password" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <button type="submit">Registrati</button>
                    </form>
                </div>
            </div>
        </section>

        <?php
            include_once("footer.php");
        ?>
    </body>
</html>