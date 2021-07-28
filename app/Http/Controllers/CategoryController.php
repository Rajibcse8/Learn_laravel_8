<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    

        // Category::insert([
        //     'category_name'=>$request->category_name,
        //     'user_id'=>Auth::user()->id,
        //     'created_at'=>Carbon::now(),
        // ]);
         
        $category=  new Category;
        $category->category_name=$request->category_name;
        $category->user_id=Auth::user()->id;
        $category->save();
     //try another methood
    } 
}
