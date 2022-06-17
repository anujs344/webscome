<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;
    //table name
    protected $table = 'career_applications';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;
}
