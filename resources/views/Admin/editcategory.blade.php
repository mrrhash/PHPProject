@extends('layout/master')
@section('page_title','Category')
@section('category_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Update Category</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/updatecategory') }}/{{ $data->id }}" class="col-6" method="post">
        @csrf
        @method('put')
        <input type="text" value="{{ $data->category }}" class="form-control" placeholder="Category Name..." name="category">
        @error('category')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" value="{{  $data->category_slug }}" class="form-control" placeholder="Category Slug..." name="category_slug">
        @error('category_slug')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="submit" name="" id="" value="Update" class="btn btn-success btn-sm">

        <a href="{{url('admin/categories')}}" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection