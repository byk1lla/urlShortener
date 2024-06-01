$(document).ready(function (){
var url = window.location.pathname;
var parts = url.split('/');
var link = parts[parts.length - 1];
request("/api/redirect", {"url": link})
    .done(function (response) {
        if(response.error){
            $("#error").toggle();
        }else{
            $("#success").toggle();
            $("#link").attr('href',response.data);
            setInterval(
                function(){
                    window.location.href = response.data;
                }
            ,3000)
        } 
    })

    .fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
    });
    
})