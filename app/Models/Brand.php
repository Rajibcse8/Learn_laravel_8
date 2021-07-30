<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Request;

class Brand extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->hasOne(Brand::class,'id','user_id');
    }
}
