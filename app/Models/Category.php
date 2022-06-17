<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //table name
    protected $table = 'categories';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }

    public function  child_categories(){
        return $this->hasMany(ChildCategory::class);
    }
    public function spare_parts(){
        return $this->hasMany(SparePart::class);
    }
}
