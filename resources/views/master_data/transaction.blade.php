@extends('layouts.app', ['titlePage' => __('Data Transaksi')])

@section('content')
<div class="container" id="manage-transaction">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Transaksi
                    <a href="{{ route('transaction.create') }}" class="btn btn-primary float-right modal-show" title="Tambah Data Transaksi">Tambah</a><br/><br/>
                </div>

                <div class="card-body">
                    <h2>Jumlah saldo: {{ $saldo }}</h2> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        {!! Form::label('date', 'Start', ['class' => 'form-control-label']) !!}
                                        {!! Form::date('start', \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'start']) !!}
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        {!! Form::label('date', 'End', ['class' => 'form-control-label']) !!}
                                        {!! Form::date('end', \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'end']) !!}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <input type="hidden" name="" id="filter-route" value="{{ route('filter.transaction', ['start','end']) }}">
                                    <a href="" style="margin-top:30px;" class="btn btn-primary float-left btn_filter">Filter</a><br/><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <input type="hidden" id="data-url" value="{{ route('transaction.table', ['start', 'end']) }}">
                    <table class="table table-bordered data-table">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Id</th>
                            <th>Jenis Transaksi</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Deskripsi</th>
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