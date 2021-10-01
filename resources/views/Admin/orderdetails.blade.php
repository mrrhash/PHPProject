@extends('layout/master')
@section('page_title','Order')
@section('order_select','active')
@section('content')


<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Order Details</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form class="col-6 text-center" >
        <label for="">Order ID</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->order_id}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Product ID</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->product_id}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Order Number</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->order_number}}" class=" text-center form-control" >       
        <br><br>
        <label for="">User ID</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->user_id}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Payment Type</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->payment_type}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Delivery Type</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->delivery_type}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Quantity</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->quantity}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Total Amount</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->total}}" class=" text-center form-control" >       
        <br><br>
        <label for="">Address</label>
        <input style="background-color: white;color:black"  type="text"   readonly value="{{$data->address}}" class=" text-center form-control" >       
        
        <br><br>
        <label for="">Contact</label>
        <input style="background-color: white;color:black"  type="text" readonly value="{{$data->contact}}" class=" text-center form-control" >       
        <br><br>
       

        
        <a href="{{url('admin/order')}}" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection