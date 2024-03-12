<?php
// Connessione al database...
$servername = "localhost";
$username = "phpmyadmin";
$password = "ciaone11";
$dbname = "Museo";

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
?>
