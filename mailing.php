<!DOCTYPE html>
<html>
<head>
    <title>Gestione Newsletter</title>
</head>

<body>
    <h1>Newsletter</h1>
    <p>Lista delle email iscritte alla newsletter</p>

    <?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "nomeDatabase";

    // Crea la connessione
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controlla la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $sql = "SELECT ID, Email, DateSubbed FROM Newsletter";
    $result = $conn->query($sql);
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Data di Iscrizione</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data di ogni riga
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["DateSubbed"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 risultati</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <h2>Invia Email di Massa</h2>
    <form action="send_mail.php" method="post">
        Oggetto: <input type="text" name="subject"><br>
        Messaggio:<br><textarea name="message" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Invia Email">
    </form>
</body>
</html>
