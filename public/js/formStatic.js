$("#buttonStat").on("click", function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById("statistic")),
        startData = $("#start").val(),
        endData = $("#end").val(),
        typeStat = $("#typeStatistic").val();

    if (startData =="" || endData=="") {
        swal({
            title: "Ошибка!",
            text: "Введите данные!",
            icon: "error",
        })
    }else {
        $.ajax({
            type : 'POST',
            url : '/application/lib/statistic.php', //$(this).attr('action')
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: 'html',
            beforeSend: function(){
                $("#buttonStat").prop("disable", true);
            },
            success: function(data){
                swal({
                    title: "Отлично!",
                    text: "Статистика создана!",
                    icon: "success",
                }).then(() => {
                    $("#content").html(data);
                    $("#buttonStat").prop("disable", false);
                });
            }
        });
    }
});

