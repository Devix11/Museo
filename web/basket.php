<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
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
    <div id="cart">
        <section>
            <h2>Carrello</h2>
            <?php
            // Abilita la visualizzazione degli errori
            ini_set('display_errors', 1);
            require("config.php");
            global $conn;
            session_start(); // Inizia la sessione

            //Form aggiunta coupon al prodotto
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['coupon']) && isset($_POST['item_index'])) {
                $index = $_POST['item_index'];
                $item = $_SESSION['cart'][$index];
                $item['cpn'] = $_POST['coupon'];
                $_SESSION['cart'][$index] = $item;
            }

            //Form eliminazione elemento dal carrello
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['item_index'])) {
                $index = $_POST['item_index'];
                array_splice($_SESSION['cart'], $index, 1);
            }

            //Form aggiunta elemento al carrello
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    !empty($_POST['name']) &&
                    !empty($_POST['price']) &&
                    !empty($_POST['qt'])
                ) {
                    //Creo l'array del prodotto in base al tipo di biglietto
                    if ( isset($_POST['desc'])){
                        $ticket = [
                            "name" => $_POST['name'],
                            "desc" => $_POST['desc'],
                            "startDate" => null,
                            "endDate" => null,
                            "price" => $_POST['price'],
                            "qt" => $_POST['qt'],
                            "cpn" => null
                        ];
                    } else {
                        $ticket = [
                            "name" => $_POST['name'],
                            "desc" => null,
                            "startDate" => $_POST['startDate'],
                            "endDate" => $_POST['endDate'],
                            "price" => $_POST['price'],
                            "qt" => $_POST['qt'],
                            "cpn" => null
                        ];
                    }

                    // Inizializza il carrello se non esiste
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }

                    $_SESSION['cart'][] = $ticket;

                } else {
                    //die(htmlspecialchars("Errore inaspettato, riprova più tardi."));
                }
            }



            if (empty($_SESSION['cart'])) {
                echo "<p>Il tuo carrello è vuoto.<p></p><br>";
                $cartIsEmpty = true;
            } else {
                $cartIsEmpty = false;
                foreach ($_SESSION['cart'] as $index => $item) {
                    $cpn = 0;
                    if (isset($item['cpn']) && !empty($item['cpn'])) {
                        $cpn = coupon($conn, $item, $index);
                        if ($cpn < 0){
                            $cpn = 0;
                            $item = newItem($item, null);
                            $_SESSION['cart'][$index] = $item;
                            echo "<script type='text/javascript'>alert('Coupon invalido');</script>";
                        }
                    }
                    if ($item['name'] == "ingresso-normale") {
                        echo "<div class=''><h3>Ingresso normale</h3>";
                        //echo "<p>Durata:<br> Da " . htmlspecialchars($item['startDate']) . " a " . htmlspecialchars($item['endDate']) . "</p>"; Non serve perchè è un ingresso normale
                        echo "<p>Prezzo: " . htmlspecialchars($item['price']) . "</p>";
                        echo "<p>Quantità: " . htmlspecialchars($item['qt']) . "</p>";
                        if (isset($item['cpn']) && !empty($item['cpn'])) {
                            echo "<p>Coupon: " . htmlspecialchars(strtoupper($item['cpn'])) . " ( " . htmlspecialchars($cpn) . "% )</p>";
                        }
                        echo "<p>TOTALE: " . htmlspecialchars(($item['qt'])*($item['price']/100*(100-$cpn))) . " &euro;" . "</p>";
                    } else {
                        echo "<div class=''><h3>" . htmlspecialchars($item['name']) . "</h3>";
                        echo "<p>Durata:<br> Da " . htmlspecialchars($item['startDate']) . " a " . htmlspecialchars($item['endDate']) . "</p>";
                        echo "<p>Prezzo: " . htmlspecialchars($item['price']) . "</p>";
                        echo "<p>Quantità: " . htmlspecialchars($item['qt']) . "</p>";
                        if (isset($item['cpn']) && !empty($item['cpn'])) {
                            echo "<p>Coupon: " . htmlspecialchars(strtoupper($item['cpn'])) . " ( " . htmlspecialchars($cpn) . "% )</p>";
                        }
                        echo "<p>TOTALE: " . htmlspecialchars(($item['qt'])*($item['price']/100*(100-$cpn))) . " &euro;" . "</p>";
                    }
                    //Aggiungi coupon
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='item_index' value='" . $index . "'>";
                    echo "<input type='text' name='coupon' placeholder='ESEMPIO'>";
                    echo "<button class='cart' type='submit'>Aggiungi coupon</button>";
                    echo "</form>";

                    //Elimina prodotto
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='item_index' value='" . $index . "'>";
                    echo "<input type='hidden' name='delete' value='1'>";
                    echo "<button class='cart' type='submit'>Elimina prodotto</button>";
                    echo "</form>";
                    echo "</div><br>";
                }
            }

            function coupon($conn, $item, $index) {
                $coupon = strip_tags(htmlentities(strtoupper($item['cpn'])));

                $sql = "SELECT C.Discount FROM Category C WHERE C.Name = ?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    return -1;
                }

                $stmt->bind_param("s", $coupon);
                $stmt->execute();

                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    $discount = $row['Discount'];
                    $stmt->close();
                    return $discount;
                } else {
                    $stmt->close();
                    return -1;
                }
            }
            $conn -> close();

            function newItem($item, $val){
                $ticket = [
                    "name" => $item['name'],
                    "desc" => $item['desc'],
                    "startDate" => $item['startDate'],
                    "endDate" => $item['endDate'],
                    "price" => $item['price'],
                    "qt" => $item['qt'],
                    "cpn" => $val
                ];
                return $ticket;
            }
            ?>
            <div>
                <button id="button1" class="float-left submit-button" >Continua lo Shopping</button>

                <script type="text/javascript">
                    document.getElementById("button1").onclick = function () {
                        location.href = "tickets.php";
                    };
                </script>
            <?php if (!$cartIsEmpty): ?>
                <button id="button2" class="float-left submit-button" >Procedi al Checkout</button>

                <script type="text/javascript">
                    document.getElementById("button2").onclick = function () {
                        location.href = "checkout.php";
                    };
                </script>
            <?php else: ?>
                <!-- <button disabled>Procedi al Checkout</button> -->
            <?php endif; ?>
            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
