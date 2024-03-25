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
            ini_set('display_errors', 1);

            require("config.php");
            global $conn;

            # Inizializza la sessione
            session_start();

            # Se l'utente non ha effettuato l'accesso, reindirizzalo alla pagina di login
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
                echo "<script>" . "window.location.href='./login.php';" . "</script>";
                exit;
            }
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
                    // Query per ottenere le prenotazioni dell'utente
                    /*foreach ($conn->query('SELECT Date, E.Name, Visitors.Name, Visitors.Surname From Purchase Left join Tickets on Purchase.Ticket = Tickets.ID Left Join Exhibitions E on Tickets.Title = E.ID Left Join Visitors on Purchase.Visitor = Visitors.CF Left Join Credentials on Buyer = Credentials.CF Where Credentials.Email =' . $_SESSION["email"]) as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["E.Name"] . "</td>";
                        echo "<td>" . $row["Visitors.Name"] . "</td>";
                        echo "<td>" . $row["Visitors.Surname"] . "</td>";
                        echo "</tr>";
                    }*/
                    
                    // Prepare the SQL statement using placeholders for variables
                    $stmt = 'SELECT Date, E.Name, Visitors.Name, Visitors.Surname 
                            FROM Purchase 
                            LEFT JOIN Tickets ON Purchase.Ticket = Tickets.ID 
                            LEFT JOIN Exhibitions E ON Tickets.Title = E.ID 
                            LEFT JOIN Visitors ON Purchase.Visitor = Visitors.CF 
                            LEFT JOIN Credentials ON Purchase.Buyer = Credentials.CF 
                            WHERE Credentials.Email = ?'; // Placeholder for email

                    // Prepare the statement
                    $stmt = mysqli_prepare($conn, $stmt);

                    // Bind the email parameter from the session
                    mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]);

                    // Execute the statement
                    mysqli_stmt_execute($stmt);

                    // Fetch the results
                    $result = mysqli_stmt_get_result($stmt);

                    // Iterate over the result set and display the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["Date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Name"]) . "</td>"; // Adjusted from E.Name to Name
                        echo "<td>" . htmlspecialchars($row["Visitors.Name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Visitors.Surname"]) . "</td>";
                        echo "</tr>";
                    }

                    mysqli_stmt_close($stmt);

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
            /*$stmt = 'SELECT Date, E.Name, Visitors.Name, Visitors.Surname From Purchase Left join Tickets on Purchase.Ticket = Tickets.ID Left Join Exhibitions E on Tickets.Title = E.ID Left Join Visitors on Purchase.Visitor = Visitors.CF Left Join Credentials on Buyer = Credentials.CF Where Credentials.Email = ?';
            $stmt = mysqli_prepare($conn, $stmt);
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]);
            foreach ($conn->query('SELECT Date, E.Name, Visitors.Name, Visitors.Surname From Purchase Left join Tickets on Purchase.Ticket = Tickets.ID Left Join Exhibitions E on Tickets.Title = E.ID Left Join Visitors on Purchase.Visitor = Visitors.CF Left Join Credentials on Buyer = Credentials.CF Where Credentials.Email =' . $_SESSION["email"]) as $row) {
                echo "<tr>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["E.Name"] . "</td>";
                echo "<td>" . $row["Visitors.Name"] . "</td>";
                echo "<td>" . $row["Visitors.Surname"] . "</td>";
                echo "</tr>";
            }*/
        ?>

        <script src="script.js"></script>
    </body>
</html>