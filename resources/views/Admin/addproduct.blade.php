@extends('layout/master')
@section('page_title','Product')
@section('product_select','active')
@section('content')
<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Add Product</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/storeproduct') }}" class="col-6" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <select class="form-control" name="category_id">
        <option  class="text-dark" value="">Select Category</option>
        @foreach($category_name as $list)
        <option class="text-dark" value="{{ $list->id }}">{{ $list->category_name }}</option>        
        @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>        

        <input type="text" class="form-control" placeholder="Product Name..." name="product_name">
        @error('product_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Quantity..." name="stock">
        @error('stock')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <label for="product_image" class="control-label mb-1">Product Image</label>
        <input type="file" class="form-control" name="image">
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>        

        <textarea class="form-control" placeholder="Product Description..." name="description"></textarea>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>       

      
        <input type="text" class="form-control" placeholder="Product Price..." name="price">
        @error('price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        
        
        <input type="submit" name="" id="" value="Add" class="btn btn-success btn-sm">

        <a href="products" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection