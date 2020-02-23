function privilege_update(id) {

    $.ajax({
        url: '/panel/privilege/get',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function(data){

            $('#modal_create_edit_title').text('Редактирование привилегии');
            $('#privilege_id').val(data.id);
            $('#privilege_name').val(data.name);
            $('#command_field').val(data.command);
            $('#how_many_pay_user').val(data.price);
            $('#discount').val(data.discount);
            if(data.period == 'on'){

                $('#issuing_period').prop('checked', true);
                $('#number_of_days_wrapper').show();
                $('#reset_command_wrapper').show();

                $('#number_of_days').val(data.amount_days);
                $('#reset_command').val(data.reset_command);

            }else{

                $('#issuing_period').prop('checked', false);
                $('#number_of_days_wrapper').hide();
                $('#reset_command_wrapper').hide();
                $('#number_of_days').val('');
                $('#reset_command').val('');
            }

            how_many_pay();

            UIkit.modal('#modal-privileges').show();


        },
        error: function (data) {

            console.log(data);

        }
    });

}

function issuing_period_func(obj) {
    result = $(obj).prop('checked');

    if(!result){

        $('#number_of_days_wrapper').hide();
        $('#reset_command_wrapper').hide();

        $('#number_of_days').prop('value', '').prop('required', false);
        $('#reset_command').prop('value', '').prop('required', false);

    }else{
        $('#number_of_days_wrapper').show();
        $('#reset_command_wrapper').show();

        $('#number_of_days').prop('required', true);
        $('#reset_command').prop('required', true);
    }
}

function how_many_pay(){
    var amount = $('#how_many_pay_user').val();
    var discount = $('#discount').val();
    if(discount > 100){
        $('#discount').val(100);
        discount = 100;
    }
    if(discount < 0){
        $('#discount').val(0);
        discount = 0;
    }
    if(!amount){
        amount = 0;
    }
    if(!discount){
        discount = 0;
    }
    discount = (amount / 100) * discount;

    $('#total').val(amount - discount+' руб');

}


$(function(){
    $('#create_privilege_form').on('submit', function(e){ // Айди формы
        e.preventDefault();
        var $that = $(this),
            formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        $.ajax({
            url: '/panel/privilege/create',
            type: 'POST',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data: formData,
            success: function(){

                window.location.href = "/panel";

            },
            error: function (data) {

                console.log(data);

            }
        });
    });
});

$(function(){
    $('#settings-freekassa').on('submit', function(e){ // Айди формы
        e.preventDefault();
        var $that = $(this),
            formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        $.ajax({
            url: '/panel/payment/freekassa',
            type: 'POST',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data: formData,
            success: function(){



            },
            error: function (data) {



            }
        });
    });
});
$(function(){
    $('#settings-unitpay').on('submit', function(e){ // Айди формы
        e.preventDefault();
        var $that = $(this),
            formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        $.ajax({
            url: '/panel/payment/unitpay',
            type: 'POST',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data: formData,
            success: function(){



            },
            error: function (data) {



            }
        });
    });
});


function privilege_delete(id){
    $.ajax({
        url: '/panel/privilege/delete',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: id
        },
        success: function(){

            window.location.href = "/panel";

        },
        error: function () {

            window.location.href = "/panel";

        }
    });
}

function clear_all_fields() {
    $('#modal_create_edit_title').text('Создание привилегии');
    $('#privilege_id').val('');
    $('#privilege_name').val('');
    $('#command_field').val('');
    $('#how_many_pay_user').val('');
    $('#discount').val('');
    $('#issuing_period').prop('checked', false);
    $('#number_of_days_wrapper').hide();
    $('#reset_command_wrapper').hide();
    $('#number_of_days').val('');
    $('#reset_command').val('');
}

UIkit.modal('#modal-rules');

UIkit.modal("#modal-privileges");