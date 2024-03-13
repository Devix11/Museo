<?php
// Mostra errori
ini_set('display_errors', 1);
// Connessione al database...
/*
$servername = "localhost";
$username = "phpmyadmin";
$password = "ciaone11";
$dbname = "Museo";

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);

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

$conn->close();*/

$to = 'davideagostini05@gmail.com';
$subject = 'Oggetto dell\'email';
$message = 'Questo è il corpo dell\'email.';
$headers = 'From: mario@yahoo.com' . "\r\n" .
    'Reply-To: mittente@yahoo.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo "Email inviata con successo.";
?>
