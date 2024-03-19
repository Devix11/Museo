<?php
  // visualizza errori
  ini_set('display_errors', 1);
  # Inizializza la sessione
  session_start();

  # Controlla se l'utente è già loggato, se sì, reindirizzalo alla pagina index
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == TRUE) {
    echo "<script>" . "window.location.href='./'" . "</script>";
    exit;
  }

  # Includi la connessione
  require_once "./config.php";

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
      $sql = "SELECT id, username, password FROM users WHERE username = ? OR email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
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
            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

            if (mysqli_stmt_fetch($stmt)) {
              # Controlla se la password è corretta
              if (password_verify($user_password, $hashed_password)) {

                # Memorizza i dati nelle variabili di sessione
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["loggedin"] = TRUE;
                $username = mysqli_real_escape_string($link, $username);

                // Query per verificare se l'utente è un amministratore
                $sql = "SELECT adm FROM users WHERE username = '$username' OR email = '$username'";
                $result = mysqli_query($link, $sql);

                if ($result) {
                  // Verifica se sono state restituite delle righe
                  echo '<script>console.log("1 if!"); </script>'; 
                  if (mysqli_num_rows($result) > 0) {
                    echo '<script>console.log("2 if!"); </script>'; 
                    $row = mysqli_fetch_assoc($result);
                    $admin = $row['adm'];

                    // Verifica se l'utente è un amministratore (supponendo che 'adm' sia un campo che abbuia valore admin per gli amm)
                    if ($admin == 'admin') {
                      echo '<script>console.log("3 if!"); </script>'; 
                      $_SESSION["admin"] = $admin;
                      var_dump($_SESSION);
                    }
                  }
                } else {
                  // Gestire il caso in cui si è verificato un errore nell'esecuzione della query SQL
                  echo "<script>" . "alert('Oops! Si è verificato un errore. Riprova più tardi.');" . "</script>";
                }

                # Reindirizza l'utente alla pagina index
                echo "<script>" . "window.location.href='./'" . "</script>";
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
    mysqli_close($link);
  }
?>

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

            // Chiusura della connessione
            $conn->close();
        ?>

        <!-- Sezione Account 
        <section id="user">
            <h2>Hai un profilo?</h2>
            <button onclick="open('login.php')">Accedi</button><br>
            <a href="register.php">Registrati</a>
        </section>  -->

        <!-- Sezione Account -->
        <section id="account">
            <h2>Account</h2>
            <div class="account-actions">
                <!-- Modulo di accesso -->
                <div class="login">
                    <h3>Accedi</h3>
                    <form action="" method="post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit">Accedi</button>
                    </form>
                </div>

                <!-- Modulo di registrazione
                
                <div class="register">
                    <h3>Registrati</h3>
                    <form action="" method="post">
                        <label for="new-username">Username:</label>
                        <input type="text" id="new-username" name="username" required>
                        <label for="new-password">Password:</label>
                        <input type="password" id="new-password" name="password" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <button type="submit">Registrati</button>
                    </form>
                </div>
                -->
            </div>
        </section>

        <!-- Footer -->
        <?php
            include_once("footer.php");
        ?>
    </body>
</html>