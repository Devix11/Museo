<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yellow Tulip Museum</title>
        <link rel="stylesheet" href="styles.css"> <!-- Collegamento ai file CSS -->
    </head>
    <body>
        <footer>
            <!-- Contenuto del footer con moduli di iscrizione alla newsletter, informazioni di contatto e mappa -->
            <div class="footer-content" style="max-width: fit-content">

                <div>
                    <!-- Informazioni di contatto -->
                    <div id="footer-contacts" style="max-width: fit-content">
                        <h3>Contattaci</h3>
                        <p>Via S. Francesco, 94, 35121 Padova PD, Italia</p>
                        <p>Telefono: +39 049 528 9287</p>
                        <p>Email: info@yellowtulipmuseum.it</p>
                    </div>

                    <!-- Modulo di iscrizione alla newsletter -->
                    <div id="newsletter" style="max-width: fit-content">
                        <h3>Iscriviti alla nostra newsletter</h3>
                        <form action="subscribe.php" method="post">
                            <label>
                                <input type="email" placeholder="Inserisci la tua email" name="email" required>
                            </label>
                            <button type="submit">Iscriviti</button><br>
                            <label>
                                <input type="checkbox" name="privacy" required>
                            </label> Acconsento all'informativa privacy
                        </form>
                    </div>
                </div>

                <div id="map" style="max-width: fit-content">
                    <h3>Dove ci puoi trovare</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2801.206506390473!2d11.877898976101477!3d45.405175171072976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda56d5f48cfb%3A0xbe00f67ac99d3984!2sVia%20S.%20Francesco%2C%2094%2C%2035121%20Padova%20PD!5e0!3m2!1sit!2sit!4v1710521708059!5m2!1sit!2sit" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Testo di copyright -->
            <p class="copy">&copy; 2024 Yellow Tulip Museum. All rights reserved.</p>
        </footer>
    </body>
</html>
