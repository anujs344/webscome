<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    //table name
    protected $table = 'careers';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

}
