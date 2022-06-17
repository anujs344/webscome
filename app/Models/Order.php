<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //table name
    protected $table = 'orders';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

    public function service_orders(){
        return $this->hasMany(ServiceOrder::class);
    }
}
