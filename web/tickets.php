<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Ticket Sales</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
</head>
<body>
    <header class="navbar">
        <!-- Intestazione con titolo e menu di navigazione -->
        <h1>Yellow Tulip Museum</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="exposures.php">Mostre</a></li>
                <li><a href="contacts.php">Contatti</a></li>
                <li><a href="account.php">Profilo</a></li>
            </ul>
        </nav>
    </header>
        <div class="container">
            <h2 style="text-align: center">Biglietti disponibili</h2>
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
            $sql = "SELECT E.Name, E.Image, T.ValidityDate, T.ExpiringDate, T.Price FROM Exhibitions E INNER JOIN Tickets T ON E.ID = T.Title";
            $result = $conn->query($sql);

        ?>
            <section id="exhibitions">
                <h2>Current Exhibitions</h2>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($row['Image']); ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                            <h3><?php echo htmlspecialchars($row['Name']); ?></h3>
                            <p>Date: <?php echo htmlspecialchars($row['ValidityDate']); ?> to <?php echo htmlspecialchars($row['ExpiringDate']); ?></p>
                            <p>Price: $<?php echo htmlspecialchars($row['Price']); ?></p>
                            <button>Buy Ticket</button>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No exhibitions found.</p>
                <?php endif; ?>
            </section>

            <?php
            $conn->close();
            ?>
            <!-- Exhibition 1 -->
            <div id="info">
                <img src="exhibition1.jpg" alt="Exhibition 1">
                <h3>Exhibition Name 1</h3>
                <p>Date: 2024-01-01 to 2024-03-30</p>
                <p>Price: $20</p>
                <button>Buy Ticket</button>
            </div>

            <!-- Exhibition 2 -->
            <div id="info">
                <img src="exhibition2.jpg" alt="Exhibition 2">
                <h3>Exhibition Name 2</h3>
                <p>Date: 2024-02-15 to 2024-04-15</p>
                <p>Price: $25</p>
                <button>Buy Ticket</button>
            </div>

            <!-- Exhibition 3 -->
            <div id="info">
                <img src="exhibition3.jpg" alt="Exhibition 3">
                <h3>Exhibition Name 3</h3>
                <p>Date: 2024-03-01 to 2024-05-01</p>
                <p>Price: $30</p>
                <button>Buy Ticket</button>
            </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>
