<!DOCTYPE html>
<html>
    <head>
        <title>Mostre</title>
        <!-- Collegamento ai file CSS -->
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <header>
            <!-- Menu di navigazione -->
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="mostre.php">Mostre</a></li>
                    <li><a href="contatti.php">Contatti</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <h1>Mostre</h1>
            <div class="row">
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

                    // Fetch della lista delle esibizioni dal database
                    $sql = "SELECT Name, Image FROM Exhibitions";
                    $result = $conn->query($sql);

                    // Controlla se ci sono delle esibizioni
                    if ($result->num_rows > 0) {
                        // Ciclo per mostrare a video tutte le esibizioni
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4">';
                                echo '<div class="card">';
                                    // Mostra l'immagine della mostra
                                    $imageData = base64_encode($row['Image']);  
                                    $src = 'data:image/jpeg;base64,' . $imageData;  
                                    echo '<img src="' . $src . '" class="card-img-top" alt="' . htmlspecialchars($row['Name']) . '">';  
                                    echo '<div class="card-body">';
                                        // Mostra il nome della mostra
                                        echo '<h5 class="card-title">' . htmlspecialchars($row['Name']) . '</h5>'; 
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        // Se non ci sono esibizioni
                        echo "Nessuna esibizione trovata.";
                    }                    

                    // Chiusura della connessione
                    $conn->close();
                ?>
            </div>
        </div>

        <footer>
            <!-- Testo del footer -->
            <p>&copy; 2022 Yellow Tulip Museum. All rights reserved.</p>
        </footer>
        
    </body>
</html>