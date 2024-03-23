<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Contatti</title>
        <!-- Collegamento ai file CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Stili di bootstrap -->
        <link rel="stylesheet" href="styles.css"> <!-- Stili personalizzati -->
    </head>
    <body>
        <header class="navbar">
            <!-- Intestazione con titolo e menu di navigazione -->
            <h1>Yellow Tulip Museum</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="exposures.php">Mostre</a></li>
                    <li><a href="tickets.php">Biglietti</a></li>
                    <li><a href="account.php">Profilo</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <!-- Titolo della pagina -->
            <h1>Contatti</h1>
            <p>Inserisci qui il tuo modulo di contatto o le informazioni di contatto.</p>

            <div class="row">
                <!-- Form per il contatto -->
                <div class="col-md-6">
                    <h2>Modulo di Contatto</h2>
                    <form action="process_contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Messaggio</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
                <!-- Informazioni di contatto -->
                <div class="col-md-6">
                    <h2>Informazioni di Contatto</h2>
                    <p>Indirizzo: Via S. Francesco, 94, 35121 Padova PD, Italia</p>
                    <p>Telefono: +39 049 827 3939</p>
                    <p>Email: info@yellowtulipmuseum.it</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php
            include_once("footer.php");
        ?>

        <script src="script.js"></script>
    </body>
</html>