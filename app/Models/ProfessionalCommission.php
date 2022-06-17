<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalCommission extends Model
{
    protected $table = 'professional_commissions';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = false;

}
