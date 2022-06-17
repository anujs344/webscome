<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    //table name
    protected $table = 'sub_categories';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function child_catgeories(){
        return $this->hasMany(ChildCategory::class);
    }
}
