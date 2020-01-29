<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class CategoryController extends Controller
{
    private $category;

    function __construct(Category $category, DataTables $dataTables){
        $this->category = $category;
        $this->dataTables = $dataTables;
    }

    public function index()
    {
        return view('master_data.category');
    }

    
    public function create()
    {
        $model = new Category();
        $kategori = [
            "Pemasukan" => "Pemasukan",
            "Pengeluaran" => "pengeluaran"
        ];
        return view('master_data.category_form', compact('model', 'kategori'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required'
        ]);

        $model = $this->category->create($request->all());

        return response()->json($model);
    }

    public function edit($id)
    {
        $model = $this->category->findOrFail($id);
        $kategori = [
            "Pemasukan" => "Pemasukan",
            "Pengeluaran" => "Pengeluaran"
        ];
        // return response()->json($model);
        return view('master_data.category_form', compact('model', 'kategori'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required'
        ]);

        $model = $this->category->findOrFail($id)->update($request->all());

        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = $this->category->findOrFail($id);
        if(!empty($model->transactions()))
            $model->transactions->delete();
        $category = $model->delete();
        return response()->json($category);
    }

    public function categoryDataTable(){
        $model = DB::table('category')
            ->select('id','type', 'name', 'description')
            ->orderBy('id')
            ->get();

        return $this->dataTables->of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
