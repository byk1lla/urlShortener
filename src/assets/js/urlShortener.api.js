$(document).ready(function (){

    $("#urlForm").on('submit',function (event) {
        sendForm(this,"/api/urlShortener", "POST")
        .done(function (response) {
            if(response.error){
                
            }else{
            var baseUrl = window.location.origin;
            $("#urlText").html(`Link Başarıyla Kısaltıldı! işte burada 👉 <a href="${baseUrl}/r/${response.data}">${baseUrl}/r/${response.data}</a>`);
            $("#urlDiv").toggle();
            }
        })

        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
        });
          
    
    
        event.preventDefault();
    })
    
})