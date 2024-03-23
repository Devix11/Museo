<!DOCTYPE html>
<html>
    <head>
        <title>Gestione Newsletter</title>
    </head>
    <body>
        <h1>Newsletter</h1>
        <p>Lista delle email iscritte alla newsletter</p>

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

        // Query per selezionare le email iscritte alla newsletter
        $sql = "SELECT ID, Email, DateSubbed FROM Newsletter";
        $result = $conn->query($sql);
        ?>

        <!-- Tabella per visualizzare le email iscritte alla newsletter -->
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Data di Iscrizione</th>
            </tr>
            <?php
                // Mostra i risultati della query in una tabella
                ini_set('display_errors', 1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["DateSubbed"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nessun risultato</td></tr>";
        }

        // Chiusura della connessione
        $conn->close();
        ?>
        </table>

        <h2>Invia Email di Massa</h2>
        <!-- Modulo per inviare email di massa -->
        <form action="send_mail.php" method="post">
            Oggetto: <input type="text" name="subject"><br>
            Messaggio:<br><textarea name="message" rows="5" cols="40"></textarea><br>
            <input type="submit" value="Invia Email">
        </form>

        <!-- Footer -->
        <?php
            include_once("footer.php");
        ?>

        <script src="script.js"></script>
    </body>
</html>