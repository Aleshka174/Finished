$("#buttonDeactive").on("click", function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("disableOffer")),
        nameOffer = $("#nameOfferActive").val();

    if (nameOffer == "") {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/offer.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                $("#buttonDeactive").prop("disable", true);
            },
            success: function(response){
                swal({
                    title: "Отлично!",
                    text: "Заказ деактивирован!",
                    icon: "success",
                }).then(() => {
                    $("#buttonDeactive").prop("disable", false);
                    location.reload();
                });
            }
        });
    }
});

