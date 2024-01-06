<?php
//% Metodo 1

//* Avviare o recuperare una sessione
session_start();

//* Distruggere tutti i dati di sessione
$_SESSION = [];

//? Possiamo anche cancellare anche il cookie di sessione.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//* Infine, distruggere la sessione.
session_destroy();

//? Reindirizza alla pagina di login
header("Location: login.php");
exit;



//% Metodo 2

/* if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_start(); // Avvia la sessione

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
    header("Location: login.php");
    exit;
} */
?>
