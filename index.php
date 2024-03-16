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
        <section id="info" style="text-align: center">
            <h2>Benvenuti allo Yellow Tulip Museum!</h2>

            <p>Lo Yellow Tulip Museum è un luogo dove la storia, l'arte e la cultura si fondono per creare un'esperienza unica e coinvolgente per i visitatori di tutte le età. Situato nel cuore pulsante della città di Padova, il nostro museo celebra la ricchezza e la diversità della storia umana attraverso una vasta collezione di reperti, opere d'arte e installazioni interattive.</p>
            <br>
            <p>Fondato nel lontano 2024, lo Yellow Tulip Museum si impegna a preservare, studiare e condividere il patrimonio culturale del mondo. La nostra missione è educare, ispirare e stimolare la curiosità attraverso mostre innovative, programmi educativi ed eventi speciali.</p>
            <br>
            <p>Dal periodo antico alla contemporaneità, esplora le innumerevoli sfaccettature della storia umana attraverso le nostre esibizioni permanenti e temporanee. Dai reperti archeologici alle opere d'arte moderne, ogni visita allo Yellow Tulip Museum è un viaggio attraverso le epoche e le culture.</p>
            <br>
            <p>Vieni a scoprire lo Yellow Tulip Museum e lasciati trasportare dalla bellezza, dall'arte e dalla storia che ci circonda. Siamo ansiosi di accoglierti e di condividere con te la nostra passione per il patrimonio culturale del mondo.</p>
            <br>
            <p>E ricordate, imparare la storia non è mai stato così divertente!!</p>
        </section>

        <div class="carousel">
            <div class="carousel-slide" id="slide1">
                <img src="./images/Carosel1.jpeg" alt="Art Piece 1">
            </div>
            <div class="carousel-slide" id="slide2">
                <img src="./images/Carosel2.jpeg" alt="Art Piece 2">
            </div>
            <div class="carousel-slide" id="slide3">
                <img src="./images/Carosel3.jpeg" alt="Art Piece 3">
            </div>
            <div class="carousel-slide" id="slide4">
                <img src="./images/Carosel4.jpeg" alt="Art Piece 1">
            </div>
            <div class="carousel-slide" id="slide5">
                <img src="./images/Carosel5.jpeg" alt="Art Piece 2">
            </div>
            <div class="carousel-slide" id="slide6">
                <img src="./images/Carosel6.jpg" alt="Art Piece 3">
            </div>
            <div class="carousel-slide" id="slide7">
                <img src="./images/Carosel7.jpg" alt="Art Piece 1">
            </div>
            <div class="carousel-slide" id="slide8">
                <img src="./images/Carosel8.jpg" alt="Art Piece 2">
            </div>
            <div class="carousel-slide" id="slide9">
                <img src="./images/Carosel9.jpg" alt="Art Piece 3">
            </div>

            <script src="script.js"></script>
        </div>

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
                    <form action="" method="post">
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
                    <form action="" method="post">
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

        <?php
            include_once("footer.php");
        ?>
    </body>
</html>



<!-- versione 2 -->

<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yellow Tulip Museum</title>
<link rel="stylesheet" href="styles.css"> <!-- Collegamento ai file CSS -->
</head>
<body>
<?php
// Abilita la visualizzazione degli errori
ini_set('display_errors', 1);

// Parametri di connessione al database
$server = "localhost"; // Indirizzo del server MySQL (MariaDB)
$user = "phpmyadmin"; // Nome utente per l'accesso al database
$pwd = "ciaone11"; // Password per l'accesso al database
$db = "Museo"; // Nome del database

// Creazione della connessione
$conn = new mysqli($server, $user, $pwd, $db);

// Controllo della connessione
if ($conn->connect_error) {
die("Connessione fallita: " . $conn->connect_error);
}

// Fetch della lista delle esibizioni dal database
$sql = "SELECT Name, Image FROM Exhibitions";
$result = $conn->query($sql);

// Controlla se ci sono delle esibizioni
if ($result->num_rows > 0) {
// Ciclo per mostrare a video tutte le esibizioni
while ($row = $result->fetch_assoc()) {
$imageData = base64_encode($row['Image']);
$src = 'data:image;base64,' . $imageData;
echo '<div class="carousel">';
echo '<div class="carousel-slide" id="slide1">';
echo '<img src="' . $src . '" alt="Art Piece 1">';
echo '</div>';
echo '<div class="carousel-slide" id="slide2">';
echo '<img src="' . $src . '" alt="Art Piece 2">';
echo '</div>';
echo '<div class="carousel-slide" id="slide3">';
echo '<img src="' . $src . '" alt="Art Piece 3">';
echo '</div>';
echo '<div class="carousel-slide" id="slide4">';
echo '<img src="' . $src . '" alt="Art Piece 1">';
echo '</div>';
echo '<div class="carousel-slide" id="slide5">';
echo '<img src="' . $src . '" alt="Art Piece 2">';
echo '</div>';
echo '<div class="carousel-slide" id="slide6">';
echo '<img src="' . $src . '" alt="Art Piece 3">';
echo '</div>';
echo '<div class="carousel-slide" id="slide7">';
echo '<img src="' . $src . '" alt="Art Piece 1">';
echo '</div>';
echo '<div class="carousel-slide" id="slide8">';
echo '<img src="' . $src . '" alt="Art Piece 2">';
echo '</div>';
echo '<div class="carousel-slide" id="slide9">';
echo '<img src="' . $src . '" alt="Art Piece 3">';
echo '</div>';

echo '<script src="script.js"></script>';
echo '</div>';
}
} else {
// Se non ci sono esibizioni
echo "Nessuna esibizione trovata.";
}

// Chiusura della connessione
$conn->close();
?>
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
<section id="info" style="text-align: center">
<h2>Benvenuti allo Yellow Tulip Museum!</h2>

<p>Lo Yellow Tulip Museum è un luogo dove la storia, l'arte e la cultura si fondono per creare un'esperienza unica e coinvolgente per i visitatori di tutte le età. Situato nel cuore pulsante della città di Padova, il nostro museo celebra la ricchezza e la diversità della storia umana attraverso una vasta collezione di reperti, opere d'arte e installazioni interattive.</p>
<br>
<p>Fondato nel lontano 2024, lo Yellow Tulip Museum si impegna a preservare, studiare e condividere il patrimonio culturale del mondo. La nostra missione è educare, ispirare e stimolare la curiosità attraverso mostre innovative, programmi educativi ed eventi speciali.</p>
<br>
<p>Dal periodo antico alla contemporaneità, esplora le innumerevoli sfaccettature della storia umana attraverso le nostre esibizioni permanenti e temporanee. Dai reperti archeologici alle opere d'arte moderne, ogni visita allo Yellow Tulip Museum è un viaggio attraverso le epoche e le culture.</p>
<br>
<p>Vieni a scoprire lo Yellow Tulip Museum e lasciati trasportare dalla bellezza, dall'arte e dalla storia che ci circonda. Siamo ansiosi di accoglierti e di condividere con te la nostra passione per il patrimonio culturale del mondo.</p>
<br>
<p>E ricordate, imparare la storia non è mai stato così divertente!!</p>
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
<form action="" method="post">
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
<form action="" method="post">
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

<?php
include_once("footer.php");
?>
</body>
</html>