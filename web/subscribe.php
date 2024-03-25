<?php
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

// Gestione della richiesta POST per l'iscrizione alla newsletter
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Query per inserire l'email nella tabella newsletter
    $sql = "INSERT INTO Newsletter (Email) VALUES ('$email')";

    // Esecuzione della query e controllo del risultato
    if ($conn->query($sql) === true) {
        echo 'Iscrizione alla newsletter avvenuta con successo!';
    } else {
        echo 'Errore durante l\'iscrizione alla newsletter: ' . $conn->error;
    }
}

// Chiusura della connessione
$conn->close();
