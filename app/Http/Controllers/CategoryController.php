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
        // $category=DB::table('categories')->
        // join('users','users.id','categories.user_id')->
        // select('categories.*','users.name')->latest()->paginate(5); 
    
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
    
    public function edit($id){
        $category=Category::find($id);
        return view('category.edit',compact('category'));
      
    }

    public function update(Request $req, $id){
       $req->validate([
           'category_name'=>'required|max:255|unique:categories',
       ],
       [
           'category_name.required'=>'You Have to Add Name For Update Category Name',
       ]
    );

    $update=Category::find($id)->update([
        'category_name'=>$req->category_name,
    ]);

    return Redirect()->route('all.category')->with('success', 'Data Update Successfully');

    }
}
