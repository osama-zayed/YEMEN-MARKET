<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','product_id', 'user_id','user_name', 'rating', 'comment'];
    protected $table = 'reviews';

    public function productreview()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
