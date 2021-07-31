@extends('layouts.app')
@section('main_content')



    <div class="py-12">
        <div class="container">
           @if (session('success'))
             
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
           @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                
                        <div class="card-header">
                            All-Brand
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Iamge</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                   @foreach ($allbrand as $brand)
                                       
                                 
                                <tr>
                                    <td>{{ $allbrand->firstItem()+$loop->index }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{ asset('image/brand/'.$brand->brand_image) }}" alt="" style="height:40px; width:40px;"></td>
                                    <td>{{ $brand->user->name }}</td>
                                    <td>
                                        @if($brand->created_at==null)
                                            <span class="text text-danger">No Timestamp Set</span>
                                        @else
                                            {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}    
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('brand/edit/'.$brand->id ) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('brand/delete/'.$brand->id) }}"class="btn btn-danger" onclick=" return confirm('Are You Sure to delete This Barnd data ?')">Delete</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        {{ $allbrand->links() }}
                      

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add-Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Brand_name">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="Brand_name">
                                    @error('brand_name')
                                    <span><strong class="text text-danger">{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Brand_name">Brand iamge</label>
                                    <input type="file" class="form-control" name="brand_image" id="Brand_name">
                                    @error('brand_image')
                                         <span><strong class="tect text-danger">{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>





        </div>
    </div>

    {{--  --}}



@endsection
