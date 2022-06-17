<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    //table name
    protected $table = 'about_us';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

}
