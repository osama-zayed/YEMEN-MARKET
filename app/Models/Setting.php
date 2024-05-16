<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [ 'name','name_ar', 'description','description_ar', 'logo', 'favicon', 'email', 'phone', 'address','dollar', 'address_ar','facebook', 'twitter', 'instagram', 'youtube', 'tiktok'];
    protected $table = 'settings';

}
