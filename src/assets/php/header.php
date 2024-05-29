<?php global $userData, $settings, $helper, $user, $page;
$title = $helper::getTitle() ?? "WebPanel";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="icon" type="image/png" href="../src/image/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Link | <?=$title == "R" ? "Redirect" : $title ?? "WebPanel"?></title>
    <link rel="stylesheet" href="../src/assets/css/index.css">
    <link rel="stylesheet" href="../src/assets/css/tailwind.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&amp;display=swap" rel="stylesheet">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../src/assets/js/config/sweetalert/popUp.js"></script>
    <!-- <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script> -->
    
<style>
  html {
    scroll-behavior: smooth;
  }
  body {
    font-family: 'Poppins', sans-serif;
  }
  
</style>
<!-- https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg -->

<body class="text-white bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 flex flex-col h-screen max-h-screen min-h-screen overflow-auto">
<nav class="bg-white border-gray-200 bg-gradient-to-r from-pink-700 via-red-700 to-yellow-800">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <i class="fa-solid fa-link text-2xl text-yellow-500"></i>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Link Kısaltıcı</span>
        </a>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <!-- Additional elements can go here -->
        </div>

        <div class="<?php if(!isset($_SESSION["userid"])){echo 'md:mr-[-100vh]';} ?> items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border  bg-gradient-to-r via-red-700  to-yellow-800 border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white bg-transparent">
                <li>
                    <a href="/home" class="transition-all ease-in-out  block py-2 px-3 
                     text-white rounded md:hover:font-semibold md:p-0 bg-transparent">Ana Sayfa</a>
                </li>
                <li>
                    <a href="/urlShortener" class="md:hover:font-semibold transition-all ease-in-out delay-5 block py-2 px-3 text-white rounded md: md:p-0 bg-transparent" aria-current="page">Link Kısalt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>