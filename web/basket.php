<!DOCTYPE html>
<html>
<head>
    <title>Carrello</title>
    <link rel="stylesheet" href="style.css"> <!-- Inclusione del foglio di stile CSS -->
</head>
<body>
<header>
        <h1>Carrello</h1>
    </header>
    <div id="cart">

    <section>
        <h2>Carrello</h2>
        <?php
        // Inizia la sessione
        session_start();

        // Controlla se il carrello è vuoto
        if(empty($_SESSION['cart'])) {
            echo "Il tuo carrello è vuoto.";
        } else {
            // Mostra gli articoli nel carrello
            foreach($_SESSION['cart'] as $item) {
                echo "Prodotto: " . $item['name'] . "<br>";
                echo "Prezzo: $" . $item['price'] . "<br>";
                echo "<br>";
            }
        }

        ?>

        <button><a href="checkout.php">Procedi al Checkout<</a></button>
        </section>
    </div>

    <!-- Includi il footer -->
    <?php include('footer.php'); ?>
</body>
</html>
