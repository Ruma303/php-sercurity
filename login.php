<?php
session_start();
include './Utils/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM utenti WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            //! Aggiungiamo una nuova variabile di sessione per il ruolo
            $_SESSION['role'] = $user['ruolo'];
            header("Location: index.php");
            exit;
        } else {
            echo "Password errata!";
        }
    } else {
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