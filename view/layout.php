<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind / DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.20.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>App Game | <?= $title ?></title>
</head>

<body>
    <div class="navbar bg-gray-100">
        <a class="btn btn-ghost normal-case text-xl mx-24" href="index.php">App<span class=" text-blue-500">Game</span></a>
    </div>
    <main class="px-24">
        <?= $content ?>
    </main>
    <footer class="footer footer-center p-4 bg-gray-100 text-base-content">
        <div>
            <p class="font-semibold py-3 ">Copyright © 2022 - All right reserved by App<span class=" text-blue-500">Game</span> Industries Ltd</p>
        </div>
    </footer>
</body>

</html>