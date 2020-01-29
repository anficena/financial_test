@extends('layouts.app', ['titlePage' => __('Data Users')])

@section('content')
<div class="container" id="manage-users">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Users</div>

                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary float-right modal-show" title="Tambah User">Tambah</a><br/><br/>
                    <input type="hidden" id="data-url" value="{{ route('user.table') }}">
                    <table class="table table-bordered data-table">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <tbody>
                            <!-- <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item btn_delete" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// $(document).ready( function () {
//     $('table').DataTable();
// } );
</script>
@endpush