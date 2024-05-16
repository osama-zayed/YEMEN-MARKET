<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merchant extends Model
{
    use HasFactory;
    protected $fillable = ['id','name_ar','name','description', 'description_ar', 'image', 'user_id','adress','phone','email','surname','city','country'];
    protected $table = 'merchants';
    public function merchant_id(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
