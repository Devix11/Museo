<?php
    ini_set('display_errors', 1);

    /*
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

    // Ottenere l'oggetto e il messaggio dalla richiesta POST
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 'From: davideagostini05@gmail.com' . "\r\n" .
        'Reply-To: davideagostini05@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $sql = "SELECT Email FROM Newsletter";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            mail($row["Email"], $subject, $message, $headers);
        }
        echo "Email inviate con successo.";
    } else {
        echo "Nessun destinatario trovato.";
    }

    $conn->close();
    */

    // Parametri per l'invio dell'email
    $to = 'davideagostini05@gmail.com'; // Indirizzo email del destinatario
    $subject = 'Oggetto dell\'email'; // Oggetto dell'email
    $message = 'Questo è il corpo dell\'email.'; // Corpo dell'email
    $headers = 'From: mario@yahoo.com' . "\r\n" . // Intestazioni dell'email
        'Reply-To: mittente@yahoo.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Invio dell'email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email inviata con successo."; // Messaggio di successo
    } else {
        echo "Errore nell'invio dell'email."; // Messaggio di errore
    }
?>