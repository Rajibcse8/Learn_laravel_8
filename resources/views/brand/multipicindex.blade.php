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
                            All-Picture
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                 

                                </tr>
                            </thead>
                            <tbody>
                                  
                                       
                                 
                               

                             

                            </tbody>
                        </table>
                 
                      

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                           MultiPic ADD
                        </div>
                        <div class="card-body">
                            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               
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
