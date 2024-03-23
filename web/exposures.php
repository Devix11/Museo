<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mostre</title>
        <link rel="stylesheet" href="styles.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    </head>
    <body>
        <header class="navbar">
            <!-- Intestazione con titolo e menu di navigazione -->
            <h1>Yellow Tulip Museum</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="tickets.php">Biglietti</a></li>
                    <li><a href="contacts.php">Contatti</a></li>
                    <li><a href="account.php">Profilo</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <h1>Mostre</h1>
            <div class="row">

                <?php
                    // Abilita la visualizzazione degli errori
                    ini_set('display_errors', 1);

                    require("config.php");
                    global $link;

                    // Fetch della lista delle esibizioni dal database
                    $sql = "SELECT Name, Image FROM Exhibitions";
                    $result = $link->query($sql);

                    // Controlla se ci sono delle esibizioni
                    if ($result->num_rows > 0) {
                        // Ciclo per mostrare a video tutte le esibizioni
                        while ($row = $result->fetch_assoc()) {
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
                    } else {
                        // Se non ci sono esibizioni
                        echo "Nessuna esibizione trovata.";
                    }

                    // Chiusura della connessione
                    $link->close();
                ?>
            </div>
        </div>

        <!-- Footer -->
        <?php
            include_once("footer.php");
        ?>

        <script src="script.js"></script>
    </body>
</html>