<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Configuration Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-slate-800 p-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Configuration Form</h1>
        <form id="configForm" class="space-y-4">
            <div>
                <label class="block text-sm font-medium">Bakım Modu</label>
                <input type="checkbox" name="bakim" class="mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium">Proje Adı</label>
                <input type="text" name="project_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium">Başlıkta Kullanılacak İsim</label>
                <input type="text" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium">Veritabanı Bağlantısı Var mı?</label>
                <input type="checkbox" id="dbConnection" name="db_connection" class="mt-1">
            </div>
            <div id="dbConfig" class="space-y-4 hidden">
                <div>
                    <label class="block text-sm font-medium">DB Host</label>
                    <input type="text" name="db_host" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium">DB Username</label>
                    <input type="text" name="db_username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium">DB Name</label>
                    <input type="text" name="db_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium">DB Password</label>
                    <input type="password" name="db_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <button type="button" id="testDbConnection" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Sınama</button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium">Mail Bağlantısı Olacak mı?</label>
                <input type="checkbox" id="mailConnection" name="mail_connection" class="mt-1">
            </div>
            <div id="mailConfig" class="space-y-4 hidden">
                <div>
                    <label class="block text-sm font-medium">Mail Username</label>
                    <input type="text" name="mail_username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium">Mail Password</label>
                    <input type="password" name="mail_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Kaydet</button>
            </div>
        </form>
        <div id="responseMessage" class="mt-4"></div>
    </div>

    <script src="/js/main.js"></script>