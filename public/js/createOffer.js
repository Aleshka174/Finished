$("#buttonCreateOffer").on("click", function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("createOfferForm")),
        nameOffer = $("#nameOffer").val(),
        prizeOffer = $("#prizeOffer").val(),
        urlOffer = $("#urlOffer").val(),
        theameOffer = $("#theameOffer").val();

    if (nameOffer == "" || prizeOffer == "" || urlOffer == "") {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/createOffer.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                
                $("#buttonCreateOffer").prop("disable", true);
            },
            success: function(response){
                swal({
                    title: "Отлично!",
                    text: "Заказ создан!",
                    icon: "success",
                }).then(() => {
                    $("#buttonCreateOffer").prop("disable", false);
                    location.reload();
                });
            }
        });
    }
});

