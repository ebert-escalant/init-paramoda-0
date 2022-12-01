<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $keyType='string';
    public $incrementing=false;
    protected $guarded=['created_at','updated_at'];
    //relacion muchos a muchos
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
    //relacion uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //relacion muchos a muchos
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    //relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    //url amigable
    public function getRouteKeyName(){
        return 'slug';
    }
}
