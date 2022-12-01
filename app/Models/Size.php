<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    public $keyType='string';
    public $incrementing=false;
    protected $fillable=['id','name'];
    //relacion muchos a muchos 
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    //relacion muchos a muchos
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
}
