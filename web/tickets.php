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
