<!DOCTYPE html>
<html lang="en" class="bg-black">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/23451d210d.js" crossorigin="anonymous"></script>
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
                    <li><a href="../projects/index.php" class="hover:text-gray-200 ease-in-out duration-300">Projects</a></li>
                    <li><a href="../about/index.php" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                    <li><a class="text-gray-100">Contact</a></li>
                </ul>

                <div class="dropdown dropdown-left lg:hidden ml-4">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="../../index.php" class="hover:text-gray-200 ease-in-out duration-300">Home</a></li>
                        <li><a href="../projects/index.php" class="hover:text-gray-200 ease-in-out duration-300">Projects</a></li>
                        <li><a href="../about/index.php" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                        <li><a class="text-gray-100">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center bg-black items-center">
        <div class="container mt-48">
            <div class="bg-zinc-900 bg-opacity-50 rounded-2xl p-8 shadow lg:w-1/2 w-full mx-auto justify-center">
                <h2 class="text-2xl text-slate-100 font-semibold mb-4">Add new project</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mt-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="input input-bordered w-full bg-opacity-25" />
                    </div>
                    <div class="mt-4">
                        <label for="description">Description</label>
                        <textarea class="textarea textarea-bordered h-24 w-full bg-opacity-25" name="description"></textarea>
                    </div>
                    <div class="mt-4">
                        <label for="githubURL">Github URL</label>
                        <input type="text" name="githubURL" class="input input-bordered w-full bg-opacity-25" />
                    </div>
                    <div class="mt-4">
                        <label for="demoURL">Demo URL</label>
                        <input type="text" name="demoURL" class="input input-bordered w-full bg-opacity-25" />
                    </div>
                    <label for="">Languages Used</label>
                    <div class="mt-4">
                        <!-- foreach add all languages  -->
                            <?php

                            foreach ($languages as $language) {
                                echo '<div class="form-control">';
                                echo '<label class="label cursor-pointer">';
                                echo '<span class="label-text">' . $language['LanguageName'] . '</span>';
                                echo '<input type="checkbox" class="checkbox checkbox-info" name="languages[]" value="' . $language['LanguageID'] . '" />';
                                echo '</label>';
                                echo '</div>';
                            
                            }
                            ?>
                    </div>
                    <div class="mt-4">
                        <label for="demoURL">Media</label>
                        <div id="mediaContainer" class="">
                            <input type="file" name="media[]" class="file-input file-input-bordered w-full bg-opacity-25 mb-2" />
                        </div>
                        <button type="button" id="addMediaButton">Add Media</button>
                    </div>
                    <div class="mt-4">
                        <button name="submit" class="btn bg-gradient-to-r from-blue-500 to-blue-400 text-white transition duration-300 ease-in-out hover:shadow-lg">Create</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <script src="../../assets/js/media.js"></script>
</body>

</html>