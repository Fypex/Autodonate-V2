function buyProduct(obj) {
    var data = $('#buy-product-'+obj.id).serializeArray();
    $.ajax({
        url: '/order',
        type: 'POST',
        dataType : 'JSON',
        data: data,
        success: function(data) {
            if(data.status == 'error')
            {
                UIkit.notification(data.message, {status: 'danger',pos: 'top-right'})
            }else{
                window.location.replace(data.message);
            }
        }
    });
}

$(function(){
    $('#register_form').on('submit', function(e){ // Айди формы
        e.preventDefault();
        var $that = $(this),
            formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        $.ajax({
            url: '/register',
            type: 'POST',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data: formData,
            success: function(){
                window.location.href = "/login";
            },
            error: function (data) {


                UIkit.notification({
                    message: data.responseText,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 3000
                });

            }
        });
    });
});

$(function(){
    $('#login_form').on('submit', function(e){ // Айди формы
        e.preventDefault();
        var $that = $(this),
            formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        $.ajax({
            url: '/login',
            type: 'POST',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data: formData,
            success: function(){
                window.location.href = "/dashboard";
            },
            error: function (data) {


                UIkit.notification({
                    message: data.responseText,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 3000
                });

            }
        });
    });
});

UIkit.modal('#modal-rules');