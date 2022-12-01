<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $keyType='string';
    public $incrementing=false;
    protected $fillable=['id','name','slug','image','icon'];

    //relacion de muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }
    
    //relacion atraves de
    public function products(){
        return $this->hasManyThrough(Product::class,Subcategory::class);
    }
    //url amigable
    public function getRouteKeyName(){
        return 'slug';
    }
}
