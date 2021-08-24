$("#buttonDeleteUser").on("click", function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("disableUser")),
    login = $("#loginDeactive").val();

    if(login == "Выберите...") {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/deactiveUser.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                $("#buttonDeleteUser").prop("disable", true);
            },
            success: function(response){
                swal({
                    title: "Отлично!",
                    text: "Пользователь деактивирован!",
                    icon: "success",
                }).then(() => {
                    $("#buttonDeleteUser").prop("disable", false);
                    location.reload();
                });
            }
        });
    }
});


