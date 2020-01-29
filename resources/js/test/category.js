$(document).ready(function() {
    $parent = $("#manage-category");
    const manageCategory = {
        init: () => {
            manageCategory.datatables();
        },
        datatables: () => {
            const url = $('#data-url').val();
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
                    { data: 'description', name: 'description' },
                    {
                        data: null,
                        render: function ( data, type, row ) {
                            // Combine the first and last names into a single table field
                            return '<div class="dropdown"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</a> <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"><a class="dropdown-item modal-show btn_edit" href="category/'+data.id+'/edit" title="Edit data user">Edit</a><a class="dropdown-item btn_delete" href="category/'+data.id+'">Delete</a></div></div>'
                        }
                    }
                ]
            });
        }
    }

    if ($parent.length) {
        manageCategory.init();
    }
})