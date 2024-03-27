<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
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
    <div id="cart">
        <section>
            <h2>Carrello</h2>
            <?php
            // Abilita la visualizzazione degli errori
            ini_set('display_errors', 1);

            session_start(); // Inizia la sessione

            //Form eliminazione elemento dal carrello
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['item_index'])) {
                $index = $_POST['item_index'];
                array_splice($_SESSION['cart'], $index, 1);
            }

            //Form aggiunta elemento al carrello
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    !empty($_POST['name']) &&
                    !empty($_POST['price']) &&
                    !empty($_POST['qt'])
                ) {
                    //Creo l'array del prodotto in base al tipo di biglietto
                    if ( isset($_POST['desc'])){
                        $ticket = [
                            "name" => $_POST['name'],
                            "desc" => $_POST['desc'],
                            "startDate" => "",
                            "endDate" => "",
                            "price" => $_POST['price'],
                            "qt" => $_POST['qt']
                        ];
                    } else {
                        $ticket = [
                            "name" => $_POST['name'],
                            "desc" => "",
                            "startDate" => $_POST['startDate'],
                            "endDate" => $_POST['endDate'],
                            "price" => $_POST['price'],
                            "qt" => $_POST['qt']
                        ];
                    }

                    // Inizializza il carrello se non esiste
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }

                    $_SESSION['cart'][] = $ticket;

                } else {
                    //die(htmlspecialchars("Errore inaspettato, riprova più tardi."));
                }
            }



            if (empty($_SESSION['cart'])) {
                echo "Il tuo carrello è vuoto.";
                $cartIsEmpty = true;
            } else {
                $cartIsEmpty = false;
                foreach ($_SESSION['cart'] as $index => $item) {
                    if ($item['name'] == "ingresso-normale") {
                        echo "<div class=''><h3>Ingresso normale</h3>";
                        //echo "<p>Durata:<br> Da " . htmlspecialchars($item['startDate']) . " a " . htmlspecialchars($item['endDate']) . "</p>"; Non serve perchè è un ingresso normale
                        echo "<p>Prezzo: " . htmlspecialchars($item['price']) . "</p>";
                        echo "<p>Quantità: " . htmlspecialchars($item['qt']) . "</p>";
                        echo "<p>TOTALE: " . htmlspecialchars($item['qt']*$item['price']) . " &euro;" . "</p>";
                    } else {
                        echo "<div class=''><h3>" . htmlspecialchars($item['name']) . "</h3>";
                        echo "<p>Durata:<br> Da " . htmlspecialchars($item['startDate']) . " a " . htmlspecialchars($item['endDate']) . "</p>";
                        echo "<p>Prezzo: " . htmlspecialchars($item['price']) . "</p>";
                        echo "<p>Quantità: " . htmlspecialchars($item['qt']) . "</p>";
                        echo "<p>TOTALE: " . htmlspecialchars(floatval($item['qt']*$item['price'])) . " &euro;" . "</p>";
                    }

                    echo "<form method='post'>";
                    echo "<input type='hidden' name='item_index' value='" . $index . "'>";
                    echo "<input type='hidden' name='delete' value='1'>";
                    echo "<button type='submit'>Elimina prodotto</button>";
                    echo "</form>";
                    echo "</div><br>";
                }
            }
            ?>
            <div>
                <button id="button1" class="float-left submit-button" >Continua lo Shopping</button>

                <script type="text/javascript">
                    document.getElementById("button1").onclick = function () {
                        location.href = "tickets.php";
                    };
                </script>
            <?php if (!$cartIsEmpty): ?>
                <button id="button2" class="float-left submit-button" >Procedi al Checkout</button>

                <script type="text/javascript">
                    document.getElementById("button2").onclick = function () {
                        location.href = "checkout.php";
                    };
                </script>
            <?php else: ?>
                <button disabled>Procedi al Checkout</button>
            <?php endif; ?>
            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
