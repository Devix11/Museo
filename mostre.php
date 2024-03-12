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
            // Fetch the list of exhibitions from your database or any other data source
            $exhibitions = [
                ['title' => 'Exhibition 1', 'image' => 'exhibition1.jpg'],
                ['title' => 'Exhibition 2', 'image' => 'exhibition2.jpg'],
                ['title' => 'Exhibition 3', 'image' => 'exhibition3.jpg'],
            ];

            // Loop through the exhibitions and display them
            foreach ($exhibitions as $exhibition) {
                echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<img src="' . $exhibition['image'] . '" class="card-img-top" alt="' . $exhibition['title'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $exhibition['title'] . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2022 Your Museum. All rights reserved.</p>
    </footer>
    
</body>
</html>