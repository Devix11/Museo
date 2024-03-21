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
                    <li><a href="index.php">Home</a></li>
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

        # Inizializza la sessione
        session_start();

        # Se l'utente non ha effettuato l'accesso, reindirizzalo alla pagina di login
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
            echo "<script>" . "window.location.href='./login.php';" . "</script>";
            exit;
        }

        // Chiusura della connessione
        $conn->close();
        ?>

        <!-- Sezione Account -->
        <section id="user">
            <h2>Il tuo account</h2>
            <p>Benvenuto, <?php echo $_SESSION["username"]; ?>!</p>
            <p><a href="logout.php">Esci</a></p>
        </section>
        <section>
            <h2>Le tue prenotazioni</h2>
            <p>Qui potrai visualizzare le tue prenotazioni.</p>
            <table>
                <?php
                    // Parametri di connessione al database
                    $server = "localhost"; // Indirizzo del server MySQL (MariaDB)
                    $user = "phpmyadmin"; // Nome utente per l'accesso al database
                    $pwd = "ciaone11"; // Password per l'accesso al database
                    $db = "Museo"; // Nome del database
                    $conn = new mysqli($server, $user, $pwd, $db);

                    // Controllo della connessione
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    // Query per ottenere le prenotazioni dell'utente
                    foreach ($conn->query('SELECT Date, E.Name, Visitors.Name, Visitors.Surname From Purchase Left join Tickets on Purchase.Ticket = Tickets.ID Left Join Exhibitions E on Tickets.Title = E.ID Left Join Visitors on Purchase.Visitor = Visitors.CF Left Join Credentials on Buyer = Credentials.CF Where Credentials.Email =' . $_SESSION["email"]) as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["E.Name"] . "</td>";
                        echo "<td>" . $row["Visitors.Name"] . "</td>";
                        echo "<td>" . $row["Visitors.Surname"] . "</td>";
                        echo "</tr>";
                    }

                    ?>
                    
            </table>
        </section>
        <section>
            <h2>Le tue informazioni</h2>
            <p>Qui potrai visualizzare e modificare le tue informazioni personali.</p>
        </section>
        <section>
            <h2>Il tuo storico</h2>
            <p>Qui potrai visualizzare i biglietti scaduti acquistati in precedenza.</p>
        </section>

        <?php
            include_once("footer.php");
        ?>
    </body>
</html>