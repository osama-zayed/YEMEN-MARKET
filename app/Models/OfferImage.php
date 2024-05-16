<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferImage extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'image', 'url'];
    protected $table = 'offer_images';

}
