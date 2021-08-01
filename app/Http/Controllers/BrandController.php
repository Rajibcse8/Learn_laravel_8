<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Db;
use Image;

class BrandController extends Controller
{
    public function index(){
        $allbrand= Brand::latest()->paginate(5);
        return view('brand.index',compact('allbrand'));
    }

    public function store(Request  $req){
       

       $req->validate([
         'brand_name'=>'required|max:255|unique:brands',
         'brand_image'=>'required|mimes:jpeg,png,jpg,gif',
       ],
       [
           'brand_name.required'=>'You must have to add a Brand name',
           'brnad_name.uniqe'=>'We Have Same Brand name Try something Unique',
           'brand_image.required'=>'you have to pick At least One Picture',
           'brnad_image.min'=>'Brand longer than 4 character',
       ]
    );

     $brand_image=$req->brand_image;
     $name_gen=hexdec(uniqid());
     $img_ext=strtolower($brand_image->getClientOriginalExtension());
     $up_location='image/brand';
     $img_name=$name_gen.'.'.$img_ext;
     //$brand_image->move($up_location,$img_name);
     Image::make($brand_image)->resize(300,200)->save('image/brand/'.$img_name);

     Brand::insert([
         'brand_name'=>$req->brand_name,
         'user_id'=>Auth::user()->id,
         'brand_image'=>$img_name,
         'created_at'=>Carbon::now(),
     ]);
      return Redirect()->back()->with('success', 'Brand Data added Successfully');
    }


    public function edit($id){
        $brand=Brand::find($id);    
        return view('brand.edit',compact('brand'));
    }

    public function update(Request $req, $id){
       
        $req->validate([
            'brand_name'=>'required|min:3|unique:brands,brand_name,'.$id,
            'brnad_image'=>'mimes:png,jpg,jpeg,gif',
        ],[
            'brand_name.required'=>'You  must have to Add brand name',
            'brand_name.min'=>'Brand name Contains At least # character',
            'brand_image.mimes'=>'this File is not supported Only image file is acceprtable',
        ]);

        if($req->brand_image){
            
            unlink('image/brand/'.$req->old_image);
            $brand_image=$req->brand_image;
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($brand_image->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            //$brand_image->move('image/brand',$img_name);
            Image::make($brand_image)->resize(300,200)->save('image/brand/'.$img_name);
            Brand::find($id)->update([
                'brand_name'=>$req->brand_name,
                'brand_image'=>$img_name,
                'created_at'=>Carbon::now(),
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Data Update SuccessFully');


        }
        else{
            Brand::find($id)->update([
                'brand_name'=>$req->brand_name,
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Data Update SuccessFully');

        }
    }


    public function delete($id){
        $brand=Brand::find($id);
        unlink('image/brand/'.$brand->brand_image);
        $brand->delete();
        return Redirect()->back()->with('success','Brand data delete Succssfuly');
    }
}
