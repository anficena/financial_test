$(document).ready(function() {
    $parent = $("#manage-transaction");
    
    if ($parent.length) {
        loadData();
    }
    
    
    function loadData(start='', end=''){
        var url;
        if(start == '' && end == ''){
            url = $('#data-url').val()
        }else{
            url = $('#data-url').val()
            url = url.replace('start', start);
            url = url.replace('end', end)
        }
        // alert(url);
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'id', name: 'id', visible: false, searchable: false },
                { data: 'type', name: 'type' },
                { data: 'name', name: 'name' },
                { data: 'date', name: 'date' },
                { data: 'nominal', name: 'nominal' },
                { data: 'description', name: 'description' },
                {
                    data: null,
                    render: function ( data, type, row ) {
                        // Combine the first and last names into a single table field
                        return '<div class="dropdown"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</a> <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"><a class="dropdown-item modal-show btn_edit" href="transaction/'+data.id+'/edit" title="Edit data user">Edit</a><a class="dropdown-item btn_delete" href="transaction/'+data.id+'">Delete</a></div></div>'
                    }
                }
            ]
        });
    }
       

    $('body').on('click', '#type_transaction', function(event){
        event.preventDefault();
        var type = $('#type_transaction').val();
        var url = $('#route-category').val();
        url = url.replace('type', type);
        // alert(url);

        $('#category_id').find('option').remove().end();

        $.ajax({
            url: url,
            dataType: 'json',
            success: function(response){
                if(response){
                    $.each(response,function(key,value){
                        $('#category_id').append($("<option/>", {
                           value: value.id,
                           text: value.name
                        }));
                    });
                }
            }
        })
    }); 

    $('body').on('click', '.btn_filter', function(event){
        event.preventDefault();
        var start = $('#start').val(),
            end = $('#end').val();
        
        $('.data-table').DataTable().clear().destroy();
        loadData(start,end);
    });
})