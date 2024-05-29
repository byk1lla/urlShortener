<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 text-white min-w-screen">
    <div class="bg-white p-10 rounded-lg shadow-md w-[100vh] text-center">
        <h1 class="text-3xl font-extrabold text-red-700 mb-6">URL Kısaltıcı</h1>
        <p class="text-lg mb-6 text-gray-700">Aşağıya Linki Yapıştırın ardından Link Gelecektir.</p>
        
        <form id="urlForm">   
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Link Girin</label>
            <div class="relative flex justify-between">
                <div class="absolute inset-y-0 start-0 flex rounded-l-md items-center ps-3 pointer-events-none bg-gradient-to-tr p-3 mr-3 from-pink-500 via-red-500 to-yellow-500">
                    <i class="fas fa-link"></i>
                </div>
                <input type="url" id="search" name="url" class="block w-full p-4 ps-10 text-sm rounded-md text-gray-900 ml-3 outline-none" placeholder="Link Yapıştırın örn: https://google.com" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                   <i class="fas fa-cut"></i> Kısalt</button>
            </div>
        </form>

        <div id="urlDiv" class="hidden mt-6 p-4 rounded-lg bg-gradient-to-r from-green-400 to-blue-500 text-white">
            <p id="urlText"></p>
        </div>
    </div>
</div>

<script src="../src/assets/js/urlShortener.api.js"></script>