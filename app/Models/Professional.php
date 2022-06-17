<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    //table name
    protected $table = 'professionals';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

}
