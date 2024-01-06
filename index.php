<?php
//* Avviare o recuperare una sessione
session_start();
//* Includere il file per la connessione al database
include './connect.php';

//? Verificare se l'utente è autenticato
if (!isset($_SESSION['user_id'])) {
    //! Se non è autenticato, reindirizzarlo alla pagina di login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold">Index</h1>

        <div class="flex gap-2 items-center">
            <a href="login.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Login</a>
            <a href="register.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Register</a>

            <!-- Logout Metodo 1 -->
            <a href="logout.php" class="text-md text-red-600 font-semibold rounded border-2 py-[.2em] px-2 hover:bg-red-500 hover:text-white">Logout</a>

            <!-- Logout Metodo 2 -->
            <!-- <form action="logout.php" method="post">
                <button type="submit" name="logout" class="text-md text-red-600
                    font-semibold rounded border-2 py-[.2em] px-2 hover:bg-red-500
                    hover:text-white">Logout</button>
            </form> -->
        </div>

        <article class="rounded flex flex-col justify-between p-8 bg-neutral-100 gap-2 shadow-xl shadow-neutral-200">
            <h2 class="text-xl text-black font-semibold">Contenuto visibile solo agli autenticati</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda voluptatem itaque quibusdam dolore doloremque sunt, labore fugit officia recusandae qui eos nemo, id facilis temporibus, eum nisi voluptates quisquam nesciunt!</p>
        </article>
    </div>
</body>

</html>
