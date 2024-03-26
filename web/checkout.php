<?php
session_start();

// Controlla se l'utente è loggato. Se no, reindirizza alla pagina di login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Reindirizza alla pagina di login
    exit; // Ferma l'esecuzione dello script
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css"> <!-- Inclusione del foglio di stile CSS -->
</head>
<body>
    <header>
        <h1>Checkout</h1>
    </header>

    <main>
        <section>
            <h2>Riepilogo Ordine</h2>
            <?php
            if (empty($_SESSION['cart'])) {
                echo "<p>Il tuo carrello è vuoto.</p>";
            } else {
                echo "<ul>";
                foreach ($_SESSION['cart'] as $item) {
                    echo "<li>" . $item['name'] . " - $" . $item['price'] . "</li>";
                }
                echo "</ul>";
            }
            ?>
        </section>

        <section>
            <h2>Informazioni di Spedizione</h2>
            <form action="order_confirmation.php" method="POST">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="address">Indirizzo:</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <button type="submit">Conferma Ordine</button>
            </form>
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
