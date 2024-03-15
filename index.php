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
                    <li><a href="tickets.php">Biglietti</a></li>
                    <li><a href="contacts.php">Contatti</a></li>
                    <li><a href="account.php">Profilo</a></li>
                </ul>
            </nav>
        </header>

        <!-- Info museo -->
        <section id="info">
            <h2>Benvenuti al Yellow Tulip Museum!</h2>

            <p>Yellow Tulip Museum è un luogo dove la storia, l'arte e la cultura si fondono per creare un'esperienza unica e coinvolgente per i visitatori di tutte le età. Situato nel cuore della città di Padova, il nostro museo celebra la ricchezza e la diversità della storia umana attraverso una vasta collezione di reperti, opere d'arte e installazioni interattive.</p>
            <br>
            <p>Fondato nel 2024, il Yellow Tulip Museum si impegna a preservare, studiare e condividere il patrimonio culturale del mondo. La nostra missione è educare, ispirare e stimolare la curiosità attraverso mostre innovative, programmi educativi e eventi speciali.</p>
            <br>
            <p>Dal periodo antico alla contemporaneità, esplora le innumerevoli sfaccettature della storia umana attraverso le nostre esibizioni permanenti e temporanee. Dai reperti archeologici alle opere d'arte moderne, ogni visita al Yellow Tulip Museum è un viaggio attraverso le epoche e le culture.</p>
            <br>
            <p>Vieni a scoprire il Yellow Tulip Museum e lasciati trasportare dalla bellezza, dall'arte e dalla storia che ci circonda. Siamo ansiosi di accoglierti e di condividere con te la nostra passione per il patrimonio culturale del mondo.</p>
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