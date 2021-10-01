@extends('layout/master')
@section('page_title','Product')
@section('product_select','active')
@section('content')
<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Update Product</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/updateproduct') }}/{{ $data->id }}" class="col-6" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <select class="form-control" name="category_id">
        <option  class="text-dark" >Select Category</option>
        <option selected class="text-dark" value="{{ $data2->id }}">{{ $data2->category_name}}</option>
        @foreach($category_name as $list)
       
        <option  class="text-dark" value="{{ $list->id }}">{{ $list->category_name}}</option>       
        @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

         <input type="text" class="form-control" value="{{$data->product_name}}" placeholder="Product Name..." name="product_name">
        @error('product_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <input type="text" value="{{$data->stock}}" class="form-control" placeholder="Quantity..." name="stock">
        @error('stock')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

         <label for="product_image" class="control-label mb-1">Product Image</label>
        <input type="file" src="{{$data->image}}" class="form-control" name="image">
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>      

        <textarea class="form-control"  placeholder="Product Description..." name="description">{{$data->description}}</textarea>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>    

        <input type="text" value="{{$data->price}}" class="form-control" placeholder="Product Price..." name="price">
        @error('price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        
        <input type="submit" name="" id="" value="Add" class="btn btn-success btn-sm">

        <a href="{{url('admin/products')}}" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection