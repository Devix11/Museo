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
                    <label for="address">Città:</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group> 
                    <label for="city">Indirizzo:</label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="form-group>
                    <label for="zip">CAP:</label>
                    <input type="text" id="zip" name="zip" required>
                </div>

                <div class="form-group>
                    <label for="country">Paese:</label>
                    <input type="text" id="country" name="country" required>
                </div>

                <div class="form-group>
                    <label for="phone">Telefono:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div class="form-group>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
        </section>
        <section>
            <h2>Metodo di Pagamento</h2>
                <div class="form-group>
                    <label for="payment">Metodo di Pagamento:</label>
                    <select id="payment" name="payment" required>
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>

                <div class="form-group>
                    <label for="card_number">Numero Carta:</label>
                    <input type="text" id="card_number" name="card_number" required>
                </div>

                <div class="form-group>
                    <label for="expiry_date">Data di Scadenza:</label>
                    <input type="text" id="expiry_date" name="expiry_date" required>
                </div>

                <div class="form-group>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>

                <div class="form-group>
                    <label for="cardholder_name">Nome del Titolare:</label>
                    <input type="text" id="cardholder_name" name="cardholder_name" required>
                </div>

                <div class="form-group
                    <label for="cardholder_surname">Cognome del Titolare:</label>
                    <input type="text" id="cardholder_surname" name="cardholder_surname" required>
                </div>
        </section>
            

                <button type="submit">Conferma Ordine</button>

            </form>
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
