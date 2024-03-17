<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendeur extends Model
{
    use HasFactory;
    protected $table="vendeurs";
    public $timstamps=false;
}
