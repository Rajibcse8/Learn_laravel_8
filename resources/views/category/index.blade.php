@extends('layouts.app')
@section('main_content')



    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                      @if(session('success'))
                          
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success')   }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                        <div class="card-header">
                            All-Category
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                               
                               @foreach ($category as $cat)
                                
                               <tr>
                                   <td>{{ $i++ }}</td>
                                <td>{{ $cat->category_name }}</td>
                                <td>{{ $cat->user_id }}</td>
                                <td>
                                    @if($cat->created_at==null)
                                        <span><strong class="text text-danger"> No Timestapm Found</strong></span>
                                     @else{{ Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}

                                    @endif
                                </td>
                              </tr>
                                   
                               @endforeach
                              
                            </tbody>
                        </table>
                        {{ $category->links() }}

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add-Category
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categoty.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name">
                                    @error('category_name')

                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Add category</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>





        </div>
    </div>

    {{--  --}}



@endsection
