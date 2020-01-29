<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class TransactionController extends Controller
{
    private $transaction;

    function __construct(Transaction $transaction, DataTables $dataTables){
        $this->transaction = $transaction;
        $this->dataTables = $dataTables;
    }

    public function index()
    {
        
        $pemasukan = $this->transaction->record('Pemasukan')->nominal;
        $pengeluaran = $this->transaction->record('Pengeluaran')->nominal;
        
        $saldo = "Rp.".number_format(($pemasukan - $pengeluaran),2,",",".");
        
        // return response()->json($saldo);
        return view('master_data.transaction', compact('saldo'));
    }

    
    public function create()
    {
        $model = new Transaction();
        $transaksi = [
            "Pemasukan" => "Pemasukan",
            "Pengeluaran" => "Pengeluaran"
        ];
        return view('master_data.transaction_form', compact('model', 'transaksi'));
    }

    public function listCategory($type){
        $model = DB::table('category')
            ->select('id', 'name')
            ->where('type', $type)
            ->get();
        return response()->json($model);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'date' => 'required',
            'nominal' => 'required'
        ]);

        $model = $this->transaction->create($request->all());

        return response()->json($model);
    }

    
    public function show(Transaction $transaction)
    {
        //
    }

    public function edit($id)
    {
        $model = $this->transaction->with('category')->findOrFail($id);
        
        $kategori = DB::table('category')->select('id', 'name')->where('type', $model->category->type)->pluck('name', 'id');
        
        $transaksi = [
            "Pemasukan" => "Pemasukan",
            "Pengeluaran" => "Pengeluaran"
        ];
        
        return view('master_data.transaction_form', compact('model', 'transaksi', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'date' => 'required',
            'nominal' => 'required'
        ]);

        $model = $this->transaction->find($id)->update($request->all());

        return response()->json($model);
    }

    
    public function destroy($id)
    {
        return response()->json($this->transaction->find($id)->delete());
    }

    public function transactionDataTable($start, $end){
        if($start == "start" && $end == "end"){
            $model = DB::table('transaction as t')
                ->select('t.id','c.type', 'c.name', 't.nominal', 't.date', 't.description')
                ->leftjoin('category as c', 'c.id', '=', 't.category_id')
                ->where(DB::raw('DATE_FORMAT(t.date, "%m")'), date('m'))
                ->orderBy('id')
                ->get();
        }else{
            $model = DB::table('transaction as t')
                ->select('t.id','c.type', 'c.name', 't.nominal', 't.date', 't.description')
                ->leftjoin('category as c', 'c.id', '=', 't.category_id')
                ->whereBetween('t.date', array($start, $end))
                ->orderBy('id')
                ->get();

        }
        
        foreach($model as $m)
            $m->nominal = "Rp.". number_format($m->nominal,2,",",".");

        return $this->dataTables->of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
