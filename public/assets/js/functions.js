function deleteS(ruta) {
    Swal.fire({
        title: 'Desea eliminar este registro ?',
        text: "La accion no se podra revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si,eliminar !',
    }).then((result) => {
        if (result.value) {
            token = $("#token").val();
            $.ajax({
                url: ruta,
                method: 'POST',
                dataType: 'json',
                data: {
                    _token: token,
                    _method: "DELETE",
                },
                success: function(msg) {
                    myTable.bootstrapTable('refresh')
                    Swal.fire('Eliminado', msg.message, 'success')
                },
                error: function(msg) {
                    Swal.fire('Error!', msg.message, 'error')
                }
            });
        }
    })
}
/*function resetForm(form) {

    $(form)[0].reset();
    $(form).find('input[type=file]').ace_file_input('reset_input_ui');
    //$(".chosen-select").val('').trigger("chosen:updated");
    $(form).find('select[class*="select2"]').val(null).trigger('change');
    $("#validpersona").html('');
    $(".help-block").html('');
    $('span[class*="block"] ').html('');
    $('div[class*="form-group"] ').removeClass('has-success');
    $('div[class*="form-group"] ').removeClass('has-error');
}*/
function rstForm(form) {
    var validator = $(form).validate();
    validator.resetForm();
    $(form).find('select[class*="select2"]').val(null).trigger('change');
    $(form).find(".error").removeClass("error");
    //$('.select2').val(null).trigger('change');
    $(form)[0].reset();
    $('span[class*="form-text"] ').html('');
}

function destroy(ruta) {
    $.gritter.removeAll();
    var formData = new FormData($("#form-destroy")[0]);
    token = $("#token").val();
    $("#btn-destroy").off('click').on('click', function() {
        $.ajax({
            url: ruta,
            type: 'post',
            data: {
                _method: "DELETE",
                _token: token
            },
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('#widget-destroy').widget_box('reload');
            },
            success: function(msg) {
                $('#widget-destroy').trigger('reloaded.ace.widget');
                myTable.ajax.reload();
                $("#modal-destroy").modal('hide');
                messageSucess(msg);
            },
            error: function(msg) {
                $('#widget-destroy').trigger('reloaded.ace.widget');
                $("#modal-destroy").modal('hide');
                messageError(msg);
            }
        });
    }); // click remove btn
}

function messageSucess(msg) {
    $.gritter.add({
        title: 'Éxito <i class="ace-icon fa fa-check"></i>',
        text: msg.messages,
        class_name: 'gritter-success gritter-center' //+ ' gritter-light'
    });
    return false;
}

function messageError(msg) {
    $.gritter.add({
        title: 'Error <i class="ace-icon fa fa-times"></i>',
        text: msg.responseJSON.messages,
        class_name: 'gritter-error gritter-center' //+ ' gritter-light'
    });
    return false;
}