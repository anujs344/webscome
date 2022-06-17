<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;
    //table name
    protected $table = 'child_categories';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sub_category(){
        $this->belongsTo(SubCategory::class);
    }
}
