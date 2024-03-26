<!DOCTYPE html>
<html>
<head>
    <title>Carrello</title>
    <link rel="stylesheet" href="styles.css"> <!-- Inclusione del foglio di stile CSS -->
</head>
<body>
    <header>
        <h1>Carrello</h1>
    </header>
    <div id="cart">
        <section>
            <h2>Carrello</h2>
            <?php
            session_start(); // Inizia la sessione

            if(empty($_SESSION['cart'])) {
                echo "Il tuo carrello è vuoto.";
                $cartIsEmpty = true;
            } else {
                // Mostra gli articoli nel carrello
                $cartIsEmpty = false;
                foreach($_SESSION['cart'] as $item) {
                    echo "Prodotto: " . $item['name'] . "<br>";
                    echo "Prezzo: $" . $item['price'] . "<br>";
                    echo "<br>";
                }
            }
            ?>
            <button><a href="exposures.php">Continua lo shopping</a></button>
            <?php if (!$cartIsEmpty): ?>
                <button><a href="checkout.php">Procedi al Checkout</a></button>
            <?php else: ?>
                <button disabled>Procedi al Checkout</button>
            <?php endif; ?>
        </section>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
