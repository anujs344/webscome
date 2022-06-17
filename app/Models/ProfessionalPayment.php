<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalPayment extends Model
{
    protected $table = 'professional_payments';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;
}
