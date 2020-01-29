<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaction extends Model
{
    protected $table = "transaction";

    protected $fillable = ['category_id', 'nominal', 'description', 'date'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function record($type){
        $data = DB::table('transaction as t')
            ->select(DB::raw('sum(nominal) as nominal'))
            ->leftjoin('category as c', 'c.id', '=', 't.category_id')
            ->where('c.type', $type)
            ->get();

        return $data[0];
    }
}
