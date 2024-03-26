<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biglietti</title>
    <link rel="stylesheet" href="styles.css">
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
    <h2 style="text-align: center">Gestione Tickets</h2>
    <?php
    // Abilita la visualizzazione degli errori
    ini_set('display_errors', 1);

    require("config.php");
    global $conn;

    // Elabora i dati del modulo quando il modulo viene inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            empty($_POST['name']) ||
            empty($_POST['desc']) ||
            empty($_POST['startDate']) ||
            empty($_POST['endDate']) ||
            empty($_POST['price'])
        ) {
        } else {//die è una funzione che termina l'esecuzione dello script
            die("Errore inaspettato, riprova più tardi.");
        }
    }
    $name = ($_POST['name']);
    $desc = ($_POST['desc']);
    $startDate = ($_POST['startDate']);
    $endDate = ($_POST['endDate']);
    $price = ($_POST['price']);
    $coupon = "";
    ?>
    <div id="">
        <?php if ($name == "ingresso-normale"): ?>
        <div>
        <h3>Riepilogo ingresso normale</h3>
        <p>Ingresso giornaliero valido per una persona</p>
        <p>Prezzo: <?php echo htmlspecialchars($price) ?></p>
    </div>
        <?php else: ?>
        <div id="info">
            <h3>Riepilogo evento - <?php echo htmlspecialchars($name); ?></h3>
            <p>Durata:<br> Da <?php echo htmlspecialchars($startDate); ?> a <?php echo htmlspecialchars($endDate); ?></p>
            <p>Prezzo: <?php echo htmlspecialchars($price); ?></p>
        </div>
        <?php endif ?>
    </div>
    <?php
    $conn->close();
    ?>
</div>
<?php
include_once("footer.php");
    ?>

<script src="script.js"></script>
</body>
</html>