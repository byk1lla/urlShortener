<div class="bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 min-h-screen flex items-center justify-center">

    <div class="bg-gray-200 p-10 rounded-lg shadow-md text-center" id="mainbox">

       
       

        <div hidden id="success">

        
        <h1 class="text-3xl font-extrabold text-red-700 mb-6">Yönlendiriliyorsunuz</h1>
        <p id="message" class="text-lg mb-6 text-gray-900">Lütfen bekleyin, kısa bir süre içinde yönlendirileceksiniz...<br>
        <span class="text-sm text-gray-400"E>Eğer yönlendirme Başlamadıysa 
            <a href="#" id="link" class=" text-blue-600 hover:underline hover:text-blue-900" >buraya</a> Tıklayın.</span>
        </p>
        <div id="loader" class="loader mx-auto ease-linear rounded-full border-8 border-t-8 border-gray-200 h-32 w-32"></div>
    </div>
    <div hidden id="error">
    <h1 class="text-3xl font-extrabold text-red-700 mb-6"><i class="fas fa-xmark text-red-700"></i> Girdiğiniz Link Geçersiz! </h1>
            <p id="message" class="text-lg mb-6 text-gray-900">
            Lütfen Geçerli Bir Link Girin veya <a class="font-semibold text-red-600 hover:text-red-900" href="../urlShortener">Yenisini oluşturun</a>.<br>
            </p>
    </div>
</div>
    
    <style>
        .loader {
            border-top-color: #3490dc;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        </style>
</div>

<script src="../src/assets/js/redirect.js"></script>


