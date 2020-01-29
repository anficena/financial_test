$('body').on('click', '.modal-show', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('.modal-title').text(title);
    $('#modal-btn-save').show();
    $('#modal-btn-save').text(me.hasClass('btn_edit') ? 'Update' : 'Simpan');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            $('.modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function(event){
    event.preventDefault();

    var form = $('#test-form');
        url = form.attr('action');
        
    form.find('.help-block').remove();
    form.find('.form-group').removeClass('.text-danger');

    var formData = new FormData(form[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){

            console.log(response);
            form.trigger('reset');

            $('#modal').modal('hide');
            $('.data-table').DataTable().ajax.reload();
            
            swal.fire(
                'Success!',
                'Data berhasil disimpan.',
                'success'
            )
        },
        error: function(xhr){
            var res = xhr.responseJSON;

            if($.isEmptyObject(res) == false){
                $.each(res.errors, function(key, value){
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('text-danger')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>')
                });
            }
            console.log(res);
        }
    });
});

$('body').on('click', '.btn_delete', function(event){
    event.preventDefault();

    var me = $(this);
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');
    
    swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak akan dapat mengembalikan data ini!!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak'
        }).then((result) => {
        if(result.value){
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method' : "DELETE",
                    '_token' : csrf_token
                },
                success: function(response){
                    $('.data-table').DataTable().ajax.reload();
                    swal.fire(
                        'Deleted!',
                        'Data berhasil dihapus.',
                        'success'
                    )
                },
                error: function(xhr){
                    var res = xhr.responseJSON;
                    console.log(res); 
                    swal.fire(
                        'Cancelled',
                        'Data gagal dihapus.',
                        'error'
                    );
                }
            });
        }  
    });
});