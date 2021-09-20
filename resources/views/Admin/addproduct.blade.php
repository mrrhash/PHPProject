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
        <option class="text-dark" value="{{ $list->id }}">{{ $list->category }}</option>        
        @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <select class="form-control" name="brand_id">
        <option  class="text-dark" value="">Select Brand</option>
        @foreach($brand_name as $list)
        <option class="text-dark" value="{{ $list->id }}">{{ $list->brand }}</option>        
        @endforeach
        </select>
        @error('brand_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <input type="text" class="form-control" placeholder="Product Name..." name="product_name">
        @error('product_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Product Slug..." name="product_slug">
        @error('product_slug')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <label for="product_image" class="control-label mb-1">Product Image</label>
        <input type="file" class="form-control" name="product_image">
        @error('product_image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <input type="text" class="form-control" placeholder="Product Model..." name="product_model">
        @error('product_model')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <textarea class="form-control" placeholder="Product Short Description..." name="product_shortdesc"></textarea>
        @error('product_shortdesc')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <textarea class="form-control" placeholder="Product Long Description..." name="product_desc"></textarea>
        @error('product_desc')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <textarea class="form-control" placeholder="Product Keywords..." name="product_keywords"></textarea>
        @error('product_keywords')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <textarea class="form-control" placeholder="Product Technical Specification..." name="product_technical_spec"></textarea>
        @error('product_technical_spec')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <textarea class="form-control" placeholder="Product Uses..." name="product_uses"></textarea>
        @error('product_uses')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        <textarea class="form-control" placeholder="Product Warranty..." name="product_warranty"></textarea>
        @error('product_warranty')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>

        
        
        <input type="submit" name="" id="" value="Add" class="btn btn-success btn-sm">

        <a href="products" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection