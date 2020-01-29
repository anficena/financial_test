@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Saldo Saat ini</div>

                <div class="card-body">
                    <h2>{{ $saldo }}</h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pemasukan (All Time)</div>

                <div class="card-body">
                    <h2>{{ $total_pemasukan }}</h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pengeluaran (All Time)</div>

                <div class="card-body">
                    <h2>{{ $total_pengeluaran }}</h2>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
