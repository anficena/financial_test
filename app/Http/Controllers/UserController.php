<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{
    public function index() {
        return view('master_data.user');
    }

    public function create() {
        $model = new User();
        return view('master_data.user_form', compact('model'));
    }

    public function store(Request $request) {
        return response()->json(User::create($request->all()));
    }

    public function edit($id) {
        $model = User::find($id);
        return view('master_data.user_form', compact('model'));
    }

    public function destroy($id){
        return response()->json(User::find($id)->delete());
    }

    public function userDataTable(){
        return DataTables::of(User::all())->addIndexColumn()->toJSon();
    }
}
