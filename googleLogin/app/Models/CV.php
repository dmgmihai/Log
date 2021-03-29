<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class CV extends Model
{
    use HasFactory;
    public $table = "cvs";
    protected $fillable = [
        'name', 'detail'
    ];
}