<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en" class="bg-black">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="bg-black overflow-hidden">
    <div class="fixed inset-0 flex justify-center items-center">
        <div class="container mx-auto">
            <div class="hero">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div class="bg-gradient-to-tl from-blue-500 to-blue-400 rounded-lg shadow-2xl" style="border-radius: 30% 70% 36% 64% / 30% 30% 70% 70%; padding: 4px;">
                        <img src="./assets/img/jeffrey.jpeg" style="border-radius: 30% 70% 36% 64% / 30% 30% 70% 70%;" class="max-w-sm rounded-lg" />
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-slate-100">
                            <span class="bg-gradient-to-r from-blue-500 to-blue-300 text-transparent bg-clip-text">Hey</span>, my name is Jeffrey
                        </h1>
                        <p class="py-6 text-slate-200">Hey there! I'm a student at Grafisch Lyceum Rotterdam, and I'm diving into the secret codes that make computers dance. Think of me as a tech maestro, using my magic wand to guide every computer move.</p>

                        <button class="btn bg-gradient-to-r from-blue-500 to-blue-400 text-white transition duration-300 ease-in-out hover:shadow-lg">Bekijk mijn projecten</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar bg-black absolute top-0 left-0 w-full flex justify-between px-6">
        <div class="navbar-start">
            <a class="normal-case text-xl text-gray-200">Jeffrey</a>
        </div>
        <div class="navbar-center"></div>
        <div class="navbar-end flex items-center">
            <div class="lg:flex space-x-4 text-gray-400 text-lg">
                <ul class="hidden lg:flex space-x-4 text-gray-400">
                    <li><a class="text-gray-100">Home</a></li>
                    <li><a href="./pages/projects/index.php" class="hover:text-gray-200 ease-in-out duration-300">Projects</a></li>
                    <li><a href="./pages/about/index.php" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                    <li><a href="./pages/contact/index.php" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                    <?php
                    if (isset($_SESSION['loggedin'])) {
                    ?>
                        <li><a href="./pages/admin/index.php" class="hover:text-gray-200 ease-in-out duration-300">Admin</a></li>
                    <?php
                    }
                    ?>

                </ul>

                <div class="dropdown dropdown-left lg:hidden ml-4">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a class="text-gray-100">Home</a></li>
                        <li><a href="./pages/projects/index.php" class="hover:text-gray-200 ease-in-out duration-300">Projects</a></li>
                        <li><a href="./pages/about/index.php" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                        <li><a href="./pages/contact/index.php" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>

</html>