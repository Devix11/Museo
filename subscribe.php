<?php
// Mostra errori
ini_set('display_errors', 1);
// Connessione al database
$servername = "localhost"; // Indirizzo del server MySQL
$username = "phpmyadmin"; // Nome utente del database
$password = "ciaone11"; // Password del database
$dbname = "Museo"; // Nome del database

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottenere l'email dalla richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Query per inserire l'email nella tabella Newsletter
    $sql = "INSERT INTO Newsletter (Email) VALUES ('$email')";

    // Eseguire la query e controllare se ha avuto successo
    if ($conn->query($sql) === TRUE) {
        echo "Iscrizione alla newsletter avvenuta con successo!";
    } else {
        echo "Errore durante l'iscrizione alla newsletter: " . $conn->error;
    }
}

// Chiudere la connessione
$conn->close();
?>