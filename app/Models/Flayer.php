<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flayer extends Model
{
    use HasFactory;
    protected $table='flayers';
    public $timstamps=false;
}
