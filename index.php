<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yellow Tulip Museum</title>
        <link rel="stylesheet" href="styles.css"> <!-- Collegamento ai file CSS -->
    </head>
    <body>
        <header>
            <!-- Intestazione con titolo e menu di navigazione -->
            <h1>Yellow Tulip Museum</h1>
            <nav>
                <ul>
                    <li><a href="exposures.php">Mostre</a></li>
                    <li><a href="#biglietti">Biglietti</a></li>
                    <li><a href="subscribe.php">Account</a></li>
                    <li><a href="contacts.php">Contatti</a></li>
                </ul>
            </nav>
        </header>

        <!-- Sezione Mostre -->
        <section id="mostre">
            <h2>Mostre Attuali</h2>
            <p>Dettagli sulle mostre correnti...</p>
        </section>

        <!-- Sezione Biglietti -->
        <section id="biglietti">
            <h2>Acquista Biglietti</h2>
            <p>Opzioni e prezzi dei biglietti...</p>
        </section>

        <!-- Sezione Account -->
        <section id="account">
            <h2>Account</h2>
            <div class="account-actions">
                <!-- Modulo di accesso -->
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

                <!-- Modulo di registrazione -->
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
            <!-- Contenuto del footer con moduli di iscrizione alla newsletter e informazioni di contatto -->
            <div class="footer-content">

                <!-- Modulo di iscrizione alla newsletter -->
                <div id="newsletter">
                    <h3>Iscriviti alla nostra newsletter</h3>
                    <form action="subscribe.php" method="post">
                        <input type="email" placeholder="Inserisci la tua email" name="email" required>
                        <button type="submit">Iscriviti</button><br>
                        <input type="checkbox" name="privacy" required> Acconsento all'informativa privacy
                    </form>
                </div>

                <!-- Informazioni di contatto -->
                <div id="footer-contacts">
                    <h3>Contattaci</h3>
                    <p>Via Roma 1, 00100 Roma, Italia</p>
                    <p>Telefono: +39 049 528 9287</p>
                    <p>Email: info@yellowtulipmuseum.it</p>
                </div>
            </div>
            
            <!-- Testo di copyright -->
            <p class="copy">&copy; 2024 Yellow Tulip Museum. All rights reserved.</p>
        </footer>
    </body>
</html>