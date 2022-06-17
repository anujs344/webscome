<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    //table name
    protected $table = 'coupons';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;
}
