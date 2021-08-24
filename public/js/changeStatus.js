$("#buttonChangeUser").submit(function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("disableUser")),
    login = $("#login").val(),

    if (login == "" || active == "") {
        $("#content").text("Введите данные");
    } 
    $("#content").text("");

    $.ajax({
        type = 'POST',
        url = '/application/lib/changeStatus.php', //$(this).attr('action')
        contentType: false,
        cache: false,
        processData: false,
        data: data,
        dataType: 'html',
        beforeSend: function(){
            $("#buttonChangeUser").prop("disable", true);
        },
        success: function(response){
            swal({
                title: "Отлично!",
                text: "Статус пользователя изменен!",
                icon: "success",
            }).then(() => {
                $("#buttonChangeUser").prop("disable", false);
                location.reload();
            });
        }
    });
});


