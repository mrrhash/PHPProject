@extends('layout/master')
@section('page_title','Color')
@section('color_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Add Color</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/storecolor') }}" class="col-6" method="post">
        @csrf
        @method('post')
        <input type="text" class="form-control" placeholder="Color..." name="color">
        @error('color')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        
        <input type="submit" name="" id="" value="Add" class="btn btn-success btn-sm">

        <a href="color" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection