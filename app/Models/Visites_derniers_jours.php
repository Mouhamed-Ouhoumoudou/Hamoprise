<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visites_derniers_jours extends Model
{
    use HasFactory;
     protected $table='visites_derniers_jours';
    public $timstamps=false;

}
