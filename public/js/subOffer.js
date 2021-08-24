$("#buttonDeactiveSub").on("click",function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("disableOffer")),
        nameOffer = $("#nameOfferActive").val();

    if (nameOffer == null) {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/offerSub.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                console.log(nameOffer);
                $("#buttonDeactiveSub").prop("disable", true);
            },
            success: function(response){
                swal({
                    title: "Отлично!",
                    text: "Вы отписались от заказа!",
                    icon: "success",
                }).then(() => {
                    $("#buttonDeactiveSub").prop("disable", false);
                    location.reload();
                });
            }
        });
    };
});
$("#buttonPutHref").on("click",function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("disableOffer")),
        nameOffer = $("#nameOfferActive").val();

    if (nameOffer == null) {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/putHref.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                $("#buttonPutHref").prop("disable", true);
            },
            success: function(data){
                $("#result").html("Скопируйте эту ссылку - " + data);
                $("#buttonPutHref").prop("disable", false);
            }
        });
    };
});


$("#buttonActiveSub").on("click", function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("enableOffer")),
        nameOffer = $("#nameOfferDeactive").val();

    if (nameOffer == null) {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/offerSub.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                $("#buttonActiveSub").prop("disable", true);
            },
            success: function(data){
                swal({
                    title: "Отлично!",
                    text: "Вы успешно подписались на заказ!\n Скопируйте эту ссылку - " + data,
                    icon: "success",
                }).then(() => {
                    $("#buttonActiveSub").prop("disable", false);
                    location.reload();
                });
            }
        });
    }
});