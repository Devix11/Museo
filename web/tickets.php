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
        global $link;

            $sql = "SELECT E.Name, E.Image, T.ValidityDate, T.ExpiringDate, T.Price FROM Exhibitions E INNER JOIN Tickets T ON E.ID = T.Title";
            $result = $link->query($sql);

        ?>
            <div id="exhibitions">
                <div id="info">
                    <h2>Biglietti Disponibili</h2>
                    <section>
                    <h3>Ingresso normale</h3>
                    <p>Ingresso giornaliero valido per una persona</p>
                    <p>Prezzo: <?php  ?></p> <!-- Manca tabella coi prezzi -->
                    <button>COMPRA ORA</button>
                    </section>
                </div>

                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <?php 
                        // Converto le date
                        $validityDate = new DateTime($row['ValidityDate']);
                        $expiringDate = new DateTime($row['ExpiringDate']);
                        $currentDate = new DateTime(); // Data e ora corrente

                        // Controllo che le date dell'evento siano valide
                        if ($currentDate >= $validityDate && $currentDate <= $expiringDate): ?>
                        <section>
                            <div id="info">
                            <img src="<?php echo htmlspecialchars($row['Image']); ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                            <h3><?php echo htmlspecialchars($row['Name']); ?></h3>
                            <p>Durata: <?php echo htmlspecialchars($row['ValidityDate']); ?> to <?php echo htmlspecialchars($row['ExpiringDate']); ?></p>
                            <p>Prezzo: <?php echo htmlspecialchars($row['Price']); ?></p>
                            <button>COMPRA ORA</button>
                            </div>
                        </section>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div id="info">
                        <p>Non ci sono esibizioni disponibili.</p>
                    </div>
                    
                <?php endif; ?>
            </div>
            <?php
            $link->close();
            ?>
    </div>
    <?php
        include_once("footer.php");
    ?>
    
    <script src="script.js"></script>
</body>
</html>
