@extends('layout/master')
@section('page_title','Payment Types')
@section('payment_type_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Update Payment Types</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/updatepayment_type') }}/{{ $data->id }}" class="col-6" method="post">
        @csrf
        @method('put')
        <input type="text" value="{{ $data->name }}" class="form-control" placeholder="Payment Type..." name="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
       
        <input type="submit" name="" id="" value="Update" class="btn btn-success btn-sm">

        <a href="{{url('admin/payment_type')}}" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection