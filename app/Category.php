<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    protected $fillable = ['type', 'name', 'description'];

    public function transactions(){
        return $this->hasMany('App\Transaction', 'category_id');
    }
}
