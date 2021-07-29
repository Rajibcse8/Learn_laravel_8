<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Db;

use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
    //
    public function test(){
       
        $category=Category::latest()->paginate(5);
        //$category=DB::table('categories')->latest()->paginate(5); 
         return view('category.index',compact('category'));

    }

    public function store(Request $request){
         
        $request->validate([
            'category_name'=>'required|max:255|unique:categories',
        ],[
            'category_name.required'=>'Plese  add Category Its mendetory',
        ]);
    

        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);
         
        // $category=  new Category;
        // $category->category_name=$request->category_name;
        // $category->user_id=Auth::user()->id;
        // $category->save();

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);
   
        return Redirect()->back()->with('success','Categorry Added Successfully');

    } 
}
