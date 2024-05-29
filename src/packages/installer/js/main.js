document.getElementById('dbConnection').addEventListener('change', function() {
    document.getElementById('dbConfig').classList.toggle('hidden', !this.checked);
});

document.getElementById('mailConnection').addEventListener('change', function() {
    document.getElementById('mailConfig').classList.toggle('hidden', !this.checked);
});

document.getElementById('testDbConnection').addEventListener('click', function() {
    Swal.fire({
        title: 'Veritabanı Bağlantısı Test Ediliyor...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
            const formData = new FormData(document.getElementById('configForm'));
            fetch('test.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Veritabanı Bağlantısı Başarılı!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Veritabanı Bağlantısı Başarısız!',
                        text: 'Lütfen veritabanı bilgilerini kontrol edin.',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Bir Hata Oluştu!',
                    text: 'Lütfen daha sonra tekrar deneyin.',
                });
            });
        }
    });
});

document.getElementById('configForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('save_config.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const responseMessage = document.getElementById('responseMessage');
        if (data.success) {
            responseMessage.textContent = data.message;
            responseMessage.className = 'text-green-500';
            // Başarılı olduğunda başka bir sayfaya yönlendirebilirsiniz
            // window.location.href = 'success.php';
        } else {
            responseMessage.textContent = data.message;
            responseMessage.className = 'text-red-500';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        responseMessage.textContent = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyin.';
        responseMessage.className = 'text-red-500';
    });
});