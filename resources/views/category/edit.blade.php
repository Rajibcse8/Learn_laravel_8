@extends('layouts.app')
@section('main_content')



    <div class="py-12">
        <div class="container">
            <div class="row">


                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Add-Category
                        </div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$category->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Update Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name"
                                        value={{ $category->category_name }}>

                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update category</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>





        </div>
    </div>

    {{--  --}}



@endsection
