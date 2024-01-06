<?php
//* Includere il file per la connessione al database
include_once './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! Recuperare i dati dal form
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //! Criptare la password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //? Preparare la query SQL per creare un record nella tabella utenti
    $stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");

    try {
        //* Eseguire la query
        $stmt->execute([$nome, $cognome, $email, $passwordHash]);
        echo "Utente registrato con successo!<br>";
        //? Reindirizzare o gestire la logica post-registrazione qui
    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold mb-3">Registrazione utente</h1>
        <div class="flex gap-2 items-center">
            <a href="index.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Index</a>
            <a href="login.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Login</a>
        </div>
    <form action="register.php" method="post" class="rounded flex flex-col justify-between p-8 bg-neutral-100 gap-2 shadow-xl shadow-neutral-200">
        <div class="flex justify-between gap-1">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required class="rounded border-2">
        </div>
        <div class="flex justify-between gap-1">
            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required class="rounded border-2">
        </div>
        <div class="flex justify-between gap-1">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required class="rounded border-2">
        </div>
        <div class="flex justify-between gap-1">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required class="rounded border-2">
        </div>
        <button type="submit" class="rounded bg-sky-500 hover:text-white mt-2">Registra</button>
    </form>
</div>
</body>
</html>