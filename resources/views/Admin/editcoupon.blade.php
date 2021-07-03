@extends('layout/master')
@section('page_title','Coupon')
@section('coupon_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Update Coupon</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/updatecoupon') }}/{{ $data->id }}" class="col-6" method="post">
        @csrf
        @method('put')
        <input type="text" value="{{ $data->coupon_title }}" class="form-control" placeholder="Coupon Title..." name="coupon_title">
        @error('coupon_title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" value="{{  $data->coupon_code }}" class="form-control" placeholder="Category Code..." name="coupon_code">
        @error('coupon_code')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" value="{{  $data->coupon_value }}" class="form-control" placeholder="Category Value..." name="coupon_value">
        @error('coupon_vale')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="submit" name="" id="" value="Update" class="btn btn-success btn-sm">

        <a href="{{url('admin/coupon')}}" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection