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

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    !empty($_POST['name']) &&
                    !empty($_POST['price']) &&
                    !empty($_POST['qt'])
                ) {
                    if ( isset($_POST['desc'])){
                        // Prepara l'array del prodotto
                        $product = [
                            "name" => $_POST['name'],
                            "desc" => $_POST['desc'],
                            "startDate" => "",
                            "endDate" => "",
                            "price" => $_POST['price'],
                            "qt" => $_POST['qt']
                        ];
                    } else {
                        // Prepara l'array del prodotto
                        $product = [
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

                    // Aggiungi il prodotto al carrello
                    $_SESSION['cart'][] = $product;

                } else {
                    // Se uno dei campi è vuoto
                    //die(htmlspecialchars("Errore inaspettato, riprova più tardi."));
                }
            }



            if (empty($_SESSION['cart'])) {
                echo "Il tuo carrello è vuoto.";
                $cartIsEmpty = true;
            } else {
                $cartIsEmpty = false;
                foreach ($_SESSION['cart'] as $item) {
                    if ($item['name'] == "ingresso-normale") {
                        echo "<div class=''><h3>Ingresso normale</h3>";
                        //echo "<p>Durata:<br> Da " . htmlspecialchars($item['startDate']) . " a " . htmlspecialchars($item['endDate']) . "</p>"; Non serve perchè è un ingresso normale
                        echo "<p>Prezzo: " . htmlspecialchars($item['price']) . "</p>";
                        echo "<p>Quantità: " . htmlspecialchars($item['qt']) . "</p>";
                        echo "<p>TOTALE: " . htmlspecialchars($item['qt']*$item['price']) . "</p></div><br>";
                    } else {
                        echo "<div class=''><h3>" . htmlspecialchars($item['name']) . "</h3>";
                        echo "<p>Durata:<br> Da " . htmlspecialchars($item['startDate']) . " a " . htmlspecialchars($item['endDate']) . "</p>";
                        echo "<p>Prezzo: " . htmlspecialchars($item['price']) . "</p>";
                        echo "<p>Quantità: " . htmlspecialchars($item['qt']) . "</p>";
                        echo "<p>TOTALE: " . htmlspecialchars($item['qt']*$item['price']) . "</p></div><br>";
                    }
                }
            }
            ?>
            <section>
            <button><a href="tickets.php">Continua lo shopping</a></button>
            <?php if (!$cartIsEmpty): ?>
                <button><a href="checkout.php">Procedi al Checkout</a></button>
            <?php else: ?>
                <button disabled>Procedi al Checkout</button>
            <?php endif; ?>
            </section>
        </section>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
