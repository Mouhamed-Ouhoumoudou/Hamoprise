<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comptebank extends Model
{
    use HasFactory;
    protected $table='compte_bancaire';
    public $timstamps=false;
}
