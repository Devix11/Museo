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
            ini_set('display_errors', 1);

        require_once "../vendor/autoload.php";

        /* require("config.php");
        global $conn;

        // Fetch della lista delle esibizioni dal database
        $sql = "SELECT ID, Name, Image FROM Images";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output delle immagini
            while ($row = $result->fetch_assoc()) {
                // Ottieni l'estensione del file dall'URL
                $extension = pathinfo($row['Name'], PATHINFO_EXTENSION);
                echo '<div class="carousel">';
                echo '<div class="carousel-slide">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="' . $row['Name'] . '" />';
                echo '</div>';
                echo '</div>';
            }
        } else { ?>
            <div style="text-align: center">Nessuna immagine trovata</div>
            <script src="script.js"></script>;
        <?php }
        $conn->close();
        */?>

        <section>
            <h2>In evidenza oggi</h2>
            <?php
            $client = new GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:3338/']);
        try {
            $response = $client->request('GET', 'exhibitions');
            $data = json_decode($response->getBody(), true);
            // echo json_encode($data);

            foreach ($data as $item) {
                ?>
                <div class="card">
                    <?php
                // TODO: change PNG to JPEG
                $src = 'data:image/png;base64,' . $item["image"]; ?>
                    <img src="<?php echo $src ?>" class="big" alt="<?php echo htmlspecialchars($item["name"]) ?>">
                    <div>
                        <!-- Mostra il nome della mostra -->
                        <h5 class="" style="text-align: center"><?php echo htmlspecialchars($item["name"]); ?></h5>
                    </div>
                </div>
                    <?php
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo "<h1>API Offline</h1>";
        }
        ?>
        </section>

        <section>
            <!-- Using PHP -->
            <h2 style="text-align: center">Api test section</h2>
            <?php
        $client = new GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:3338/']);
        $response = $client->request('GET', 'test');
        $data = json_decode($response->getBody(), true);
        echo json_encode($data);
        ?>
        </section>

        <!-- Footer -->
        <?php
        include_once("footer.php");
        ?>

        <script src="script.js"></script>
    </body>
</html>