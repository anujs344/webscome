<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddedSpare extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable= ['order_id','service_id','spare_id','spare_price'];
}
