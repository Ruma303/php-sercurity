<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); //! Reindirizza al login se non è loggato
    exit;
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    //! Reindirizza alla pagina di errore 403 se non autorizzato
    header("Location: ../View/page403.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold">Dashboard</h1>

        <div class="flex gap-2 items-center">
            <a href="../login.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Login</a>
            <a href="../register.php" class="text-md text-sky-600 font-semibold underline underline-offset-2">Register</a>
            <a href="../index.php" class="text-md text-emerald-600 font-semibold underline underline-offset-2">Index</a>
            <a href="./listPage.php" class="text-md text-orange-600 font-semibold underline underline-offset-2">Lists</a>
            <a href="../logout.php" class="text-md text-red-600 font-semibold rounded border-2 py-[.2em] px-2 hover:bg-red-500 hover:text-white">Logout</a>
        </div>

        <article class="rounded flex flex-col justify-between p-8 bg-neutral-100 gap-2 shadow-xl shadow-red-600">
            <h2 class="text-xl text-red-600 font-semibold">Contenuto visibile solo dagli admins</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda voluptatem itaque quibusdam dolore doloremque sunt, labore fugit officia recusandae qui eos nemo, id facilis temporibus, eum nisi voluptates quisquam nesciunt!</p>
        </article>
    </div>
</body>

</html>
