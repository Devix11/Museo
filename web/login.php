<?php
ini_set('display_errors', 1);

require("config.php");
global $conn;

session_start();

# Controlla se l'utente è già loggato, se sì, reindirizzalo alla pagina index
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    echo "<script>" . "window.location.href='./account.php'" . "</script>";
    exit;
}

# Definisci le variabili e inizializzale con valori vuoti
$user_login_err = $user_password_err = $login_err = "";
$user_login = $user_password = "";

# Elabora i dati del modulo quando il modulo viene inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["user_login"]))) {
        $user_login_err = "Inserisci il tuo nome utente o un indirizzo email.";
    } else {
        $user_login = trim($_POST["user_login"]);
    }

    if (empty(trim($_POST["user_password"]))) {
        $user_password_err = "Inserisci la tua password.";
    } else {
        $user_password = trim($_POST["user_password"]);
    }

    # Convalida le credenziali
    if (empty($user_login_err) && empty($user_password_err)) {
        # Prepara una query di selezione
        $sql = "SELECT CF, password FROM Credentials WHERE CF = ? OR email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            # Associa le variabili alla query come parametri
            mysqli_stmt_bind_param($stmt, "ss", $param_user_login, $param_user_login);

            # Imposta i parametri
            $param_user_login = $user_login;

            # Esegui la query
            if (mysqli_stmt_execute($stmt)) {
                # Memorizza il risultato
                mysqli_stmt_store_result($stmt);

                # Controlla se l'utente esiste, se sì, verifica la password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    # Associa i valori del risultato alle variabili
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);

                    if (mysqli_stmt_fetch($stmt)) {
                        # Controlla se la password è corretta
                        if (password_verify($user_password, $hashed_password)) {

                            # Memorizza i dati nelle variabili di sessione
                            $_SESSION["username"] = $username;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $user_login;
                            $username = mysqli_real_escape_string($conn, $username);

                            # Reindirizza l'utente alla pagina index
                            echo "<script>" . "window.location.href='./account.php'" . "</script>";
                            exit;
                        } else {
                            # Se la password è errata, mostra un messaggio di errore
                            $login_err = "L'email o la password inserita non è corretta.";
                        }
                    }
                } else {
                    # Se l'utente non esiste, mostra un messaggio di errore
                    $login_err = "Nome utente o password non validi.";
                }
            } else {
                echo "<script>" . "alert('Oops! Si è verificato un errore. Riprova più tardi.');" . "</script>";
                echo "<script>" . "window.location.href='./login.php'" . "</script>";
                exit;
            }

            # Chiudi la query
            mysqli_stmt_close($stmt);
        }
    }

    # Chiudi la connessione
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema di accesso utente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
    <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
    <script defer src="./script.js"></script>
    <style>
        :root {
            --dark-color: #333;
            --light-color: #f9f9f9;
        }

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .btn-primary {
            background-color: var(--dark-color);
            color: var(--light-color);
        }

        .btn-primary:hover {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .form-wrap {
            background-color: var(--light-color);
            border-color: var(--dark-color);
        }

        input, textarea {
            background-color: var(--light-color);
            color: var(--dark-color);
            border: 1px solid var(--dark-color);
        }

        input::placeholder {
            color: var(--dark-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <?php
                    if (!empty($login_err)) {
                        echo "<div class='alert alert-danger'>" . $login_err . "</div>";
                    }
                ?>
                <div class="form-wrap border rounded p-4">
                    <h1>Accedi</h1>
                    <p>Effettua il login per continuare</p>
                    <!-- il modulo inizia qui -->
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
                        <div class="mb-3">
                            <label for="user_login" class="form-label">Email o nome utente</label>
                            <input type="text" class="form-control" name="user_login" id="user_login" value="<?= $user_login; ?>">
                            <small class="text-danger"><?= $user_login_err; ?></small>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_password" id="password">
                            <small class="text-danger"><?= $user_password_err; ?></small>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="togglePassword">
                            <label for="togglePassword" class="form-check-label">Mostra password</label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary form-control" name="submit" value="Accedi">
                        </div>
                        <p class="mb-0">Non hai un account? <a href="./register.php">Registrati</a></p>
                    </form>
                    <!-- il modulo finisce qui -->
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
