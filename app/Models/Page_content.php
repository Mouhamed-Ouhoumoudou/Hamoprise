<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page_content extends Model
{
    use HasFactory;
    protected $table='pages_contents';
    public $timstamps=false;
}
?>