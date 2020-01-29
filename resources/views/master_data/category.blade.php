@extends('layouts.app', ['titlePage' => __('Data Kategori')])

@section('content')
<div class="container" id="manage-category">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kategori (Pemasukan dan Pengeluaran)</div>

                <div class="card-body">
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-right modal-show" title="Tambah Kategori">Tambah</a><br/><br/>
                    <input type="hidden" id="data-url" value="{{ route('category.table') }}">
                    <table class="table table-bordered data-table">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Id</th>
                            <th>Type</th>
                            <th>Nama</th>
                            <th>Diskripsi</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <tbody>
                          
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection