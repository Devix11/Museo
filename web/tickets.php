<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biglietti</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="navbar">
        <!-- Intestazione con titolo e menu di navigazione -->
        <h1>Yellow Tulip Museum</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="exposures.php">Mostre</a></li>
                <li><a href="contacts.php">Contatti</a></li>
                <li><a href="account.php">Profilo</a></li>
            </ul>
        </nav>
    </header>
        <div class="container">
            <h2 style="text-align: center">Biglietti disponibili</h2>
            <?php
            // Abilita la visualizzazione degli errori
            ini_set('display_errors', 1);

            require("config.php");
            global $conn;
            $sql = "SELECT P.Price FROM Prices P WHERE P.ID = 1";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $price = htmlspecialchars($row['Price']);
            } else {
                $price = "Errore: prezzo non trovato";
            }
            ?>
            <div id="exhibitions">
                <div class="info">
                    <section>
                    <h3>Ingresso normale</h3>
                    <p>Ingresso giornaliero valido per una persona</p>
                    <p>Prezzo: <?php echo($price) ?></p>
                    <button>COMPRA ORA</button>
                    </section>
                </div>

                <?php
                    $sql = "SELECT E.Name, E.Image, T.ValidityDate, T.ExpiringDate, P.Price FROM Exhibitions E INNER JOIN Prices P ON E.ID = P.Exhibition INNER JOIN Tickets T ON E.ID = T.Title";
            $result = $conn->query($sql);
            if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <?php
                    // Converto le date
                    $validityDate = new DateTime($row['ValidityDate']);
                        $expiringDate = new DateTime($row['ExpiringDate']);
                        $currentDate = new DateTime(); // Data e ora corrente

                        // Controllo che le date dell'evento siano valide
                        if ($currentDate >= $validityDate && $currentDate <= $expiringDate): ?>
                        <section class="info">
                            <div id="img">
                                <p><?php echo '<img class="tiny" src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="' . $row['Name'] . '" />'; ?></p>
                            </div>
                            <div id="info">
                            <h3><?php echo htmlspecialchars($row['Name']); ?></h3>
                            <p>Durata: <?php echo htmlspecialchars($row['ValidityDate']); ?> to <?php echo htmlspecialchars($row['ExpiringDate']); ?></p>
                            <p>Prezzo: <?php echo htmlspecialchars($row['Price']); ?></p>
                            <button>COMPRA ORA</button>
                            </div>
                        </section>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div style="text-align: center">
                        <h3>Non ci sono esibizioni disponibili.</h3>
                    </div>
                    
                <?php endif; ?>
            </div>
            <?php
            $conn->close();
            ?>
    </div>
    <?php
        include_once("footer.php");
            ?>
    
    <script src="script.js"></script>
</body>
</html>
