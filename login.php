<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yellow Tulip Museum</title>
    <link rel="stylesheet" href="styles.css"> <!-- Collegamento ai file CSS -->
</head>
<body>
<header class="navbar">
    <!-- Intestazione con titolo e menu di navigazione -->
    <h1>Yellow Tulip Museum</h1>
    <nav>
        <ul>
            <li><a href="exposures.php">Mostre</a></li>
            <li><a href="tickets.php">Biglietti</a></li>
            <li><a href="contacts.php">Contatti</a></li>
        </ul>
    </nav>
</header>


<!-- Sezione php per la gestione login/registrazione -->
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

// Chiusura della connessione
$conn->close();
?>
<!-- Sezione Account -->
<section id="account">
    <h2>Account</h2>
    <div class="account-actions">
        <!-- Modulo di accesso -->
        <div class="login">
            <h3>Accedi</h3>
            <form action="login_process.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="example@email.it" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="********" required><br>
                <button type="submit">Accedi</button>
            </form>
        </div>
    </div>
</section>

<?php
include_once("footer.php");
?>
</body>
</html>
