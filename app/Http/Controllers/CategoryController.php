<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
    //
    public function test(){
       Category::insert([
          'category_name'=>'Car',
          'user_id'=>Auth::user()->id
       ]);

    }
}
