<?php
global $settings;

?>


    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-gray-800 p-6 rounded-lg min-w-xl shadow-md text-center">
            <div class="text-5xl mb-4 px-5 py-1">😶‍🌫️</div>
            <h1 class="text-2xl font-semibold mb-2 px-5 py-1">Oops! 😣</h1>
            <p class="text-lg mb-6 capitalize mt-2 px-5 py-1"><?=$settings["error"]["type"]?>: <?=$settings["error"]["message"]?></p>
            <a href="/home" class="bg-indigo-500  transition-all delay-5 ease-in-out text-white py-2 px-4 rounded-full hover:bg-indigo-600">Ana Sayfaya Dön</a>
        </div>
    </div>
