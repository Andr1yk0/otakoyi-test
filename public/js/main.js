/**
 * Created by ANDRIY on 16.11.2016.
 */
(function(){
    var $content = $('.content');
    var $loading = $('.content_wrap .loading');
    addEventListeners();
    function getResponseErrors(value){
        console.log(value);
        try{
            var obj = JSON.parse(value);
            return obj.errors;
        }catch (e){
            return false;
        }
    }

    function showFormErrors(form, errors){
        $(form).find('.has-error').removeClass('has-error');
        $(form).find('.form_error').remove();
        for(var field in errors){
            var form_group = $(form).find('[name="'+field+'"]').parents('.form-group');
            $(form_group).addClass('has-error');
            var field_errors = errors[field];
            for(var i in field_errors){
                var error_div = $('.hidden_elements .form_error').clone();
                $(error_div).find('.error_text').text(field_errors[i]);
                $(form_group).append(error_div);
            }
        }
    }

    function loadRecordForm(){
        $('#record_modal .modal-title').text($(this).attr('data-describe'));
        $('#record_modal').modal('show');
        $('#record_modal .modal-body').load($(this).attr('href'));
        return false;
    }

    function sendRecordForm(){
        var form = $(this);
        $.post($(form).attr('action'), $(form).serialize(),function(data){
            var errors = getResponseErrors(data);
            if(errors){
                showFormErrors(form,errors);
            }else{
                $('#record_modal').modal('hide');
                $($content).html(data);
            }

        });
        return false
    }

    function getControllsData(){
        return {
            offset: $('.pagination .active>a').attr('data-offset'),
            column: $('#sorting_column').val(),
            sorting_order: $('#sorting_order').val()
        }
    }

    function refreshTable(){
        $($loading).show();
        var data = getControllsData();
        $.post('/',data,function(data){
            $($content).html(data);
            $($loading).hide();
        });
    }

    function captchaReload(e){
        e.stopPropagation();
        e.preventDefault();
        console.log(this);
        $.post($(this).attr('href'),function(data){
            $('.captcha').attr('src',data);
        });
    }

    function changeActivePage(){
        $('.pagination .active').removeClass('active');
        $(this).addClass('active');
    }

    function deleteRecord(){
        var row = $(this).parents('tr');
        $(row).addClass('bg-danger');
        if(confirm('Видалити запис?')){
            $.post($(this).attr('href'),function(){
                window.location.reload();
            });
        }
        $(row).removeClass('bg-danger');
        return false
    }

    function addEventListeners(){
        $('body').on('submit', '#record_form', sendRecordForm);
        $('body').on('click', '.captcha_reload', captchaReload);
        $('#add_record_btn').click(loadRecordForm);
        $('body').on('click', '.edit_btn', loadRecordForm);
        $('body').on('click', '.delete_btn', deleteRecord);
        $('#sorting_column, #sorting_order').change(refreshTable);
        $('.pagination').on('click','li:not(.active)',changeActivePage);
        $('.pagination').on('click','li:not(.active)',refreshTable);

    }
})();