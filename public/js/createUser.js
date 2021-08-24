$("#buttonCreateUser").on("click", function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("createUser")),
    login = $("#login").val(),
    password = $("#password").val(),
    statusUser = $("#statusUser").val();

    if (login == "" || password == "" || statusUser == "Выберите...") {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/createUser.php', 
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                $("#buttonCreateUser").prop("disable", true);
            },
            success: function(response){
                swal({
                    title: "Отлично!",
                    text: "Пользователь создан!",
                    icon: "success",
                }).then(() => {
                    $("#buttonCreateUser").prop("disable", false);
                    location.reload();
                });
            },
            error: function(response, status, error){
                var errors = response.responseJSON;
                if (errors.errors) {
                    errors.errors.forEach(function(data, index) {
                        var field = Object.getOwnPropertyNames (data);
                        var value = data[field];
                        var div = $("#"+field[0]).closest('div');
                        div.addClass('has-danger');
                        div.children('.form-control-feedback').text(value);
                    });
                }
            }
        });
    }
});


