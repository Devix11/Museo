<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo Virtuale</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Museo Virtuale</h1>
        <nav>
            <ul>
                <li><a href="#mostre">Mostre</a></li>
                <li><a href="#biglietti">Biglietti</a></li>
                <li><a href="#account">Account</a></li>
                <li><a href="#contatti">Contatti</a></li>
            </ul>
        </nav>
    </header>

    <section id="mostre">
        <h2>Mostre Attuali</h2>
        <p>Dettagli sulle mostre correnti...</p>
    </section>

    <section id="biglietti">
        <h2>Acquista Biglietti</h2>
        <p>Opzioni e prezzi dei biglietti...</p>
    </section>

    <section id="account">
        <h2>Account</h2>
        <div class="account-actions">
            <div class="login">
                <h3>Accedi</h3>
                <form action="login_url" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Accedi</button>
                </form>
            </div>
            <div class="register">
                <h3>Registrati</h3>
                <form action="register_url" method="post">
                    <label for="new-username">Username:</label>
                    <input type="text" id="new-username" name="username" required>
                    <label for="new-password">Password:</label>
                    <input type="password" id="new-password" name="password" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <button type="submit">Registrati</button>
                </form>
            </div>
        </div>
    </section>
        <footer>
        <div class="footer-content">
            <div id="newsletter">
                <h3>Iscriviti alla nostra newsletter</h3>
                <form action="subscribe.php" method="post">
                    <input type="email" placeholder="Inserisci la tua email" name="email" required>
                    <button type="submit">Iscriviti</button>
                </form>
            </div>

            <div id="footer-contacts">
                <h3>Contattaci</h3>
                <p>Via Roma 1, 00100 Roma, Italia</p>
                <p>Telefono: +39 012 345 6789</p>
                <p>Email: info@museovirtuale.it</p>
            </div>
        </div>
        <p class="copy">&copy; 2024 Tulipano Giallo</p>
        </footer>
    </body>
</html>