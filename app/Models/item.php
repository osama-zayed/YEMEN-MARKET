<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table ="item";
    protected $fillable=['id', 'TITLE', 'PRICE', 'TAXES', 'ADS', 'DISCOUNT', 'TOTAL', 'CATEGORY'];

}
