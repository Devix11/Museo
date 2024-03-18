<!DOCTYPE html>
<html>
    <head>
        <title>Contatti</title>
        <!-- Collegamento ai file CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Stili di bootstrap -->
        <link rel="stylesheet" href="styles.css"> <!-- Stili personalizzati -->
    </head>
    <body>
        <header>
            <!-- Navbar -->
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="exposures.php">Mostre</a></li>
                    <li><a href="contacts.php">Contatti</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <!-- Titolo della pagina -->
            <h1>Contatti</h1>
            <p>Contattaci
            Via S. Francesco, 94, 35121 Padova PD, Italia

            Telefono: +39 049 528 9287

            Email: info@yellowtulipmuseum.it</p>
            
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
                    <p>Inserisci qui le tue informazioni di contatto.</p>
                </div>
            </div>
        </div>

        <?php
            include_once("footer.php");
        ?>
    </body>
</html>