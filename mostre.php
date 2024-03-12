<!DOCTYPE html>
<html>
<head>
    <title>Mostre</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
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
            //Mostra errori mysql
            ini_set('display_errors', 1);
            // Fetch the list of exhibitions from your database or any other data source
            // Connect to the MySQL database
            $servername = "localhost";
            $username = "phpmyadmin";
            $password = "ciaone11";
            $dbname = "Museo";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the list of exhibitions from the database
            $sql = "SELECT name, image FROM exhibitions";
            $result = $conn->query($sql);

            // Check if there are any exhibitions
            if ($result->num_rows > 0) {
                // Loop through the exhibitions and display them
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No exhibitions found.";
            }

            // Close the database connection
            $conn->close();
            
            
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2022 Your Museum. All rights reserved.</p>
    </footer>
    
</body>
</html>