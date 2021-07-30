<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Db;

class BrandController extends Controller
{
    public function index(){
        //$brand= Brand::latest()->paginate(5);
        return view('brand.index');
    }

    public function store(){
        dd('hello world');
    }
}
