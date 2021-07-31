@extends('layouts.app')
@section('main_content')

    
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit-Brand
                    </div>
                    <div class="card-body">
                        <form action="{{ url('brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-control">
                                <label for="Brand_name">Update Brand Name</label>
                                <input type="text" name="brand_name" value="{{ $brand->brand_name }}">
                            </div>
                            <div class="form-control">
                                <label for="brand_image">Update Brand Image</label>
                                <input type="file" name="brnad_image" value="{{ $brand->brand_image }}">
                            </div>
                            <div class="form-control">
                                <img src="{{ asset('image/brand/'.$brand->brand_image) }}" style="width:400px; height:250px;">
                            </div>
                            <button type="submit" class="btn btn-info">Update Brand</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection