<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name','name_ar', 'description','description_ar','number_of_ratings','ratings', 'image', 'price', 'discount_price', 'category_id','offer','merchant_id'];
    protected $table = 'products';


    public  function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public  function merchant(){
        return $this->belongsTo(User::class, 'merchant_id');
    }

    public function productColorSize(){
        return $this->hasMany(ProductColorSize::class, 'product_id');
    }
    public function productreview(){
        return $this->hasMany(Review::class, 'product_id');
    }

    public function productColor(){
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function productSize(){
        return $this->hasMany(ProductSize::class, 'product_id');
    }
}
