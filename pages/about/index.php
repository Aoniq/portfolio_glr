<!DOCTYPE html>
<html lang="en" class="bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/23451d210d.js" crossorigin="anonymous"></script>
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
                    <li><a href="../../index.php" class="hover:text-gray-200 ease-in-out duration-300">Home</a></li>
                    <li><a href="../projects/index.php" class="hover:text-gray-200 ease-in-out duration-300">Projects</a></li>
                    <li><a class="text-gray-100">About</a></li>
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
                        <li><a href="../projects/index.php" class="hover:text-gray-200 ease-in-out duration-300">Projects</a></li>
                        <li><a class="text-gray-100">About</a></li>
                        <li><a href="../contact/index.php" class="hover:text-gray-200 ease-in-out duration-300">Contact</a></li>
                        </ul>
                </div>
            </div>            
        </div>
    </div>
    
    <div class="flex justify-center bg-black">
        <div class="container mt-48">
            <div class="card bg-zinc-900 bg-opacity-50">
                <div class="card-body">
                    <!-- grid layout 2 columns -->
                    <div class="grid grid-cols-2 gap-x-6">
                        <div class="col-span-2 md:col-span-1">
                            <h2 class="card-title text-2xl">
                                <span class="text-2xl bg-gradient-to-r from-blue-500 to-blue-300 text-transparent bg-clip-text">I'm Jeffrey – a dreamer, doer, and lifelong learner.</span>
                            </h2>
                            <div class="grid grid-cols-1 gap-2">
                                <div class="col-span-1 md:col-span-1">
                                    <p class="mt-2">Hey, I'm Jeffrey, a 16-year-old tech enthusiast from Alphen aan den Rijn, Netherlands. Currently studying software development at Grafisch Lyceum Rotterdam, I'm also part of the team at Albert Heijn, where I've learned teamwork and efficiency.
                                        My interests span from the speed of Formula 1 to the intricacies of cars, and I'm equally at home in the gym, pushing my limits. Programming fascinates me, and I see it as a path to crafting innovative solutions that change the world.
                                        Cryptocurrencies intrigue me; I'm exploring how their tech can disrupt industries. My overarching goal? To invent tech with a lasting impact, whether it's revolutionizing software, harnessing blockchain, or integrating AI.
                                    </p>
                                </div>
                                    <div class="col-span-1 md:col-span-1">
                                        <h2 class="card-title text-2xl mt-4">
                                            <span class="text-2xl text-gray-100">Skills</span>
                                        </h2>
                                        <div class="flex mt-2">
                                            <span class="text-gray-100 mr-4"><i class="fab fa-2xl text-amber-300 fa-square-js"></i> JavaScript</span>
                                            <span class="text-gray-100 mr-4"><i class="fab fa-2xl fa-php text-blue-600"></i> PHP</span>
                                            <span class="text-gray-100 mr-4"><i class="fa-brands fa-2xl fa-node text-emerald-400"></i> NodeJS</span>
                                            <span class="text-gray-100 mr-4"><i class="fa-solid fa-2xl fa-database text-rose-400"></i> SQL</span>
                                            <span class="text-gray-100"><i class="fab fa-2xl text-orange-600 fa-html5"></i> HTML/CSS</span>
    
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-span-2 md:col-span-1 animate__animated animate__lightSpeedInRight">
                            
                            <div class="grid grid-cols-2 gap-2">
                                <div class="col-span-2 md:col-span-1">
                                    <h2 class="card-title text-2xl">
                                        <span class="text-2xl text-gray-100">Education</span>
                                    </h2>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <h2 class="text-lg font-semibold mb-2 text-gray-300">Jenaplaneet</h2>
                                            <p class="text-gray-400">Primary school</p>
                                            <p class="text-gray-500 mt-1">2010 - 2018</p>
                                        </div>
                                        <div class="timeline-item">
                                            <h2 class="text-lg font-semibold mb-2 text-gray-300">Ashram College</h2>
                                            <p class="text-gray-400">High school</p>
                                            <p class="text-gray-500 mt-1">2018 - 2022</p>
                                        </div>
                                        <div class="timeline-item">
                                            <h2 class="text-lg font-semibold mb-2 text-gray-300">Grafisch Lyceum Rotterdam</h2>
                                            <p class="text-gray-400">Studying Software Development</p>
                                            <p class="text-gray-500 mt-1">2022 - Present</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <h2 class="card-title text-2xl">
                                        <span class="text-2xl text-gray-100">Work</span>
                                    </h2>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <h2 class="text-lg font-semibold mb-2 text-gray-300">Albert Heijn</h2>
                                            <p class="text-gray-400">Stock filler</p>
                                            <p class="text-gray-500 mt-1">2022 - Present</p>
                                        </div>
                                        <div class="timeline-item">
                                            <h2 class="text-lg font-semibold mb-2 text-gray-300"><a href="https://hostvio.net" target="_blank">Hostvio</a></h2>
                                            <p class="text-gray-400">Chief Technical Officer</p>
                                            <p class="text-gray-500 mt-1">2022 - Present</p>
                                        </div>
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
