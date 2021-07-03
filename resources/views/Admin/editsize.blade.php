@extends('layout/master')
@section('page_title','Size')
@section('size_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Update Size</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/updatesize') }}/{{ $data->id }}" class="col-6" method="post">
        @csrf
        @method('put')
        <input type="text" value="{{ $data->size }}" class="form-control" placeholder="Size...." name="size">
        @error('size')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        
        <input type="submit" name="" id="" value="Update" class="btn btn-success btn-sm">

        <a href="{{url('admin/size')}}" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection