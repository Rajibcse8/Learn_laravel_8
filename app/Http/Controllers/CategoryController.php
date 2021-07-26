<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
    //
    public function test(){
 
         return view('category.index');

    }

    public function store(Request $request){
         
        $request->validate([
            'category_name'=>'required|max:255|unique:categories',
        ],[
            'category_name.required'=>'Plese  add Category Its mendetory',
        ]);
    


    } 
}
