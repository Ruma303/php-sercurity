<?php
//* Avviare o recuperare una sessione
session_start();
//* Includere il file per la connessione al database
include './connect.php';

//? Controllare se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //! Cercare l'utente nel database usando l'email
    $stmt = $conn->prepare("SELECT * FROM utenti WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    //! Verifica della password de l'utente è stato trovato
    if ($user) {
        if (password_verify($password, $user['password'])) {
            //* Impostare la sessione o il cookie qui
            $_SESSION['user_id'] = $user['id'];
            //? Reindirizzamento alla risorsa protetta
            header("Location: index.php");
            exit;
        } else {
            //! Gestire l'errore di autenticazione
            echo "Password errata!";
        }
    } else {
        //! Gestire l'errore "Utente non trovato"
        echo "Nessun utente trovato con questa email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold">Login</h1>
        <div class="flex gap-2 items-center">
            <a href="index.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Index</a>
            <a href="register.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Register</a>
        </div>
        <form action="login.php" method="post" class="rounded flex flex-col justify-between p-8 bg-neutral-100 gap-2 shadow-xl shadow-neutral-200">
            <div class="flex justify-between gap-1">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required class="rounded border-2">
            </div>
            <div class="flex justify-between gap-1">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required class="rounded border-2">
            </div>
            <button type="submit" class="rounded bg-sky-500 hover:text-white mt-2">Login</button>
        </form>
    </div>
</body>
</html>