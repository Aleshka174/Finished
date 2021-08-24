$("#buttonCoin").on("click", function(e){
    e.preventDefault();
    $.ajax({
        type : "POST",
        url : "/application/lib/coinSystem.php", //$(this).attr('action')
        contentType: false,
        cache: false,
        processData: false,
        dataType: "html",
        beforeSend: function(){
            $("#buttonCoin").prop("disable", true);
        },
        success: function(data){
            swal({
                title: "Отлично!",
                text: "Доход посчитан!",
                icon: "success",
            }).then(() => {
                $("#resultCoin").html("Система заработала - " + data + " рублей! <br>");
                $("#buttonCoin").prop("disable", false);
            });
        }
    });
});


