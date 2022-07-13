<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'discription'
    ];
    
    public function images()
    {
        return $this->hasMany('\Models\Image','Product_id','id');
    }
}
