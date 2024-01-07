<?php
//* Avviare o recuperare una sessione
/* session_start();
//* Includere il file per la connessione al database
include './Utils/connect.php';

//? Verificare se l'utente è autenticato
if (!isset($_SESSION['user_id'])) {
    //! Se non è autenticato, reindirizzarlo alla pagina di login
    header("Location: ../login.php");
    exit;
} */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold">Editor</h1>

        <div class="flex gap-2 items-center">
            <a href="../login.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Login</a>
            <a href="../register.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Register</a>
            <a href="../index.php" class="text-md text-emerald-600 font-semibold underline underline-offset-2">Index</a>
            <a href="./dashboard.php" class="text-md text-orange-600 font-semibold underline underline-offset-2">Dashboard</a>
            <a href="../logout.php" class="text-md text-red-600 font-semibold rounded border-2 py-[.2em] px-2 hover:bg-red-500 hover:text-white">Logout</a>
        </div>

        <article class="rounded flex flex-col justify-between p-8 bg-neutral-100 gap-2 shadow-xl shadow-neutral-200">
            <h2 class="text-xl text-sky-600 font-semibold">Contenuto visibile solo dagli <span class="text-md text-orange-600 font-semibold">editors</span> e dagli <span class="text-md text-emerald-600 font-semibold">admins</span></h2>
            <ul>
                <li>Risorsa 1</li>
                <li>Risorsa 2</li>
                <li>Risorsa 3</li>
            </ul>
        </article>
    </div>
</body>

</html>