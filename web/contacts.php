<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contatti</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header class="navbar">
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
        <section class="info2">
                <!-- Form per il contatto -->
                <div class="col1">
                    <h2>Contattaci!</h2>
                    <form class="col1" action="process_contact.php" method="POST">
                        <div class="form-group">
                            <label class="col1" for="name">Nome</label>
                            <input class="col1" type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="col1" for="email">Email</label>
                            <input class="col1" type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="col1" for="message">Messaggio</label>
                            <textarea class="col1" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit">Invia</button>
                    </form>
                </div>
                <!-- Informazioni di contatto -->
                <div class="col2">
                    <h2>Informazioni di Contatto</h2>
                    <p>Indirizzo: Via S. Francesco, 94, 35121 Padova PD, Italia</p>
                    <p>Telefono: +39 049 827 3939</p>
                    <p>Email: info@yellowtulipmuseum.it</p>
                    <br>
                    <div id="map" style="max-width: fit-content">
                        <h3>Dove ci puoi trovare</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2801.206506390473!2d11.877898976101477!3d45.405175171072976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda56d5f48cfb%3A0xbe00f67ac99d3984!2sVia%20S.%20Francesco%2C%2094%2C%2035121%20Padova%20PD!5e0!3m2!1sit!2sit!4v1710521708059!5m2!1sit!2sit" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
        </section>

        <script src="script.js"></script>
    </body>
</html>