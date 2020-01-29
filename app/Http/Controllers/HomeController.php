<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class HomeController extends Controller
{
    private $transaction;

    function __construct(Transaction $transaction){
        $this->transaction = $transaction;
    }

    public function index()
    {
        $pemasukan = $this->transaction->record('Pemasukan')->nominal;
        $pengeluaran = $this->transaction->record('Pengeluaran')->nominal;
        
        $saldo = "Rp.".number_format(($pemasukan - $pengeluaran),2,",",".");

        $total_pemasukan ="Rp.".number_format(($pemasukan),2,",",".");
        $total_pengeluaran = "Rp.".number_format(($pengeluaran),2,",",".");

        return view('home', compact('saldo', 'total_pemasukan', 'total_pengeluaran'));
    }
}
