<!DOCTYPE html>
<html lang="en" class="bg-black">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/23451d210d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../../styles/style.css">
</head>

<body class="bg-black">
    <div class="navbar bg-black fixed top-0 w-full flex justify-between px-6">
        <div class="navbar-start">
            <a class="normal-case text-xl text-gray-200">Jeffrey</a>
        </div>
        <div class="navbar-center"></div>
        <div class="navbar-end flex items-center">
            <div class="lg:flex space-x-4 text-gray-400 text-lg">
                <ul class="hidden lg:flex space-x-4 text-gray-400">
                    <li><a href="../../index.php" class="hover:text-gray-200 ease-in-out duration-300">Home</a></li>
                    <li><a href="../projects/index.php" class="text-gray-100">Projects</a></li>
                    <li><a href="../about/index.php" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                    <li><a href="../contact/index.php" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                </ul>

                <div class="dropdown dropdown-left lg:hidden ml-4">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="../../index.php" class="hover:text-gray-200 ease-in-out duration-300">Home</a></li>
                        <li><a href="../projects/index.php" class="text-gray-100">Projects</a></li>
                        <li><a href="../about/index.php" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                        <li><a href="../contact/index.php" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center bg-black pb-24">
        <div class="container mt-48">
            <div class="card bg-zinc-900 bg-opacity-50">
                <div class="card-body">
                    <div class="carousel w-full">
                        <?php
                        // make for loop for each image
                        for ($i = 0; $i < count($images); $i++) {
                            $image = $images[$i];
                        
                            // make slide with slideid
                            echo '<div id="slide' . $i . '" class="carousel-item relative w-full">';
                            echo '<img src="../../assets/uploads/' . $image . '" class="h-96 w-full" />';
                            echo '<div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">';
                            echo '<a href="#slide' . ($i - 1) . '" class="btn btn-circle">❮</a>';
                            echo '<a href="#slide' . ($i + 1) . '" class="btn btn-circle">❯</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                        
                    </div>
                    <div>
                        <div class="grid grid-cols-2 gap-6 mt-8">
                            <div class="col-span-2 md:col-span-1">
                                <h2 class="font-bold text-3xl text-white"><?= $project['ProjectName']; ?></h2>
                                <p class=""><?= $project['description']; ?></p>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <div class="w-full">
                                    <h2 class="font-bold text-3xl text-white">Languages</h2>
                                    <!-- Assuming this is within your project_view.php file -->
                                    <div class="project-languages">
                                        <h3>Languages Used:</h3>
                                        <div class="flex mt-2">
                                            <?php foreach ($languageNames as $languageName) : ?>
                                                <?php
                                                // Map languages to their respective icons and classes
                                                $languageIcons = [
                                                    'Javascript' => ['icon' => 'fa-square-js', 'class' => 'fab icon-javascript text-amber-300'],
                                                    'PHP' => ['icon' => 'fa-php', 'class' => 'fab icon-php text-blue-600'],
                                                    'NodeJS' => ['icon' => 'fa-node', 'class' => 'fab icon-nodejs text-emerald-400'],
                                                    'SQL' => ['icon' => 'fa-database', 'class' => 'fas icon-sql text-rose-400'],
                                                    'HTML/CSS' => ['icon' => 'fa-html5', 'class' => 'fab icon-htmlcss text-orange-600']
                                                    // Add more languages and their icons and classes as needed
                                                ];

                                                // Determine if the language has a known icon
                                                if (isset($languageIcons[$languageName])) {
                                                    $icon = $languageIcons[$languageName]['icon'];
                                                    $class = $languageIcons[$languageName]['class'];
                                                } else {
                                                    $icon = 'fa-code'; // Default icon
                                                    $class = 'fas'; // Default class (FontAwesome Solid)
                                                }

                                                // Echo the language icon and name
                                                echo '<span class="text-gray-100 mr-4"><i class="' . $class . ' fa-2x ' . $icon . '"></i> ' . $languageName . '</span>';
                                                ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="w-full mt-8">
                                    <h2 class="font-bold text-3xl text-white">Links</h2>
                                    <!-- Assuming this is within your project_view.php file -->
                                        <div class="flex mt-2 items-center">
                                            <!-- github icon -->
                                            <a href="<?= $project['github_url']; ?>" target="_blank" class="mr-2">
                                                <i class="fa-brands fa-github text-4xl"></i>
                                            </a>
                                            <a href="<?= $project['demo_url']; ?>" target="_blank" class="btn bg-gradient-to-r from-blue-500 to-blue-400 text-white transition duration-300 ease-in-out hover:shadow-lg">
                                                Demo
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>