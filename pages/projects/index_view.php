<!DOCTYPE html>
<html lang="en" class="bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/23451d210d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
                    <li><a href="../../index.html" class="hover:text-gray-200 ease-in-out duration-300">Home</a></li>
                    <li><a class="text-gray-100">Projects</a></li>
                    <li><a href="../../pages/about/index.html" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                    <li><a href="../../pages/contact/index.html" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                </ul>
            
                <div class="dropdown dropdown-left lg:hidden ml-4">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="../../index.html" class="hover:text-gray-200 ease-in-out duration-300">Home</a></li>
                        <li><a class="text-gray-100">Projects</a></li>
                        <li><a href="../../pages/about/index.html" class="hover:text-gray-200 ease-in-out duration-300">About</a></li>
                        <li><a href="../../pages/contact/index.html" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                        </ul>
              </div>
            </div>            
        </div>
    </div>
    
    <div class="flex justify-center bg-black">
        <div class="container mt-48 animate__animated animate__fadeIn animate_slow">
            <div class="grid grid-cols-3 gap-8">
                <?php
                // loop through the projects
                foreach ($projects as $project) {
                    ?>
                    <div class="col-span-3 md:col-span-1">
                    <div class="card bg-zinc-900 bg-opacity-50">
                        <figure class="h-48"><img src="../../assets/uploads/<?= $project['ImageURL']; ?>" class="object-cover w-full h-full" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-white"><?= $project['ProjectName']; ?></h2>
                            <p><?= $project['description']; ?></p>
                            <!-- make a button on the left and a timestamp on the right -->
                            <div class="card-actions flex justify-between items-center">
                                <div class="flex justify-start items-center">
                                    <a href="./project.php?id=<?= $project['ProjectID']; ?>" class="btn bg-gradient-to-r from-blue-500 to-blue-400 text-white transition duration-300 ease-in-out hover:shadow-lg">Read more</a>
                                </div>
                                <div class="flex justify-end items-center">
                                    <div class="tooltip tooltip-bottom" data-tip="<?= $project['creation_date']; ?>">
                                        <p class="ml-2"><i class="far fa-clock"></i> <span class="timestamp" data-creation="<?= $project['creation_date']; ?>"></span></p>
                                    </div>
                                </div>
                            </div>                               
                        </div>
                    </div>
                </div>
               <?php }
                ?>
             </div>
        </div>
        
    </div>
</body>
</html>
