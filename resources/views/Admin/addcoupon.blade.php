@extends('layout/master')
@section('page_title','Coupon')
@section('coupon_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Add Coupon</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/storecoupon') }}" class="col-6" method="post">
        @csrf
        @method('post')
        <input type="text" class="form-control" placeholder="Coupon Title..." name="coupon_title">
        @error('coupon')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Coupon Code..." name="coupon_code">
        @error('coupon_code')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Coupon Value..." name="coupon_value">
        @error('coupon_value')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="submit" name="" id="" value="Add" class="btn btn-success btn-sm">

        <a href="coupon" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection