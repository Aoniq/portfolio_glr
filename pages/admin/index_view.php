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

  <div class="flex justify-center bg-black">
    <div class="container mt-48">
      <div class="card bg-zinc-900 bg-opacity-50">
        <div class="card-body">
          <div class="overflow-x-auto">
            <div class="flex justify-end">
              <div class="">
                <a href="./create.php" class="btn btn-success text-slate-100">Create</a>
              </div>
            </div>
            <table class="table table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Images</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <!-- php foreach through projects -->
                <?php foreach ($projects as $project) : ?>
                  <tr>
                    <th><?php echo $project['ProjectID']; ?></th>
                    <td><?php echo $project['ProjectName']; ?></td>
                    <td class=""><?php echo substr($project['description'], 0, 50); ?>...</td>
                    <td class="">
                      <?php foreach ($project['images'] as $image) : ?>
                        <img src="../../assets/uploads/<?= $image ?>" alt="" width="100" height="100">
                      <?php endforeach; ?>
                    </td>
                    <td class="flex gap-2">
                      <a href="edit.php?id=<?php echo $project['ProjectID']; ?>" class="btn btn-warning text-white"><i class="fa-solid fa-pen"></i></a>
                      <a href="delete.php?id=<?php echo $project['ProjectID']; ?>" class="btn btn-error text-white"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>