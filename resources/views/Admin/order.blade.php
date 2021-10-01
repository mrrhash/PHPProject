@extends('layout/master')
@section('order_select','active')
@section('page_title','Order')
@section('content')

<div class="jumbotron" style="margin-top: 100px;">
  <h1 class="display-3">Orders</h1>
   
  <hr class="my-2">
 
  
  @if(session('msg'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ session('msg') }}
  </div>
  @endif
  <div class="table-responsive">
<table class="table table-striped table-secondary" >
  <thead>
    <tr class="">
      <th class="font-weight-bold" scope="col">ID</th>
      <th class="font-weight-bold" scope="col">Order ID</th>            
      <th class="font-weight-bold" scope="col">Product ID</th> 
      <th class="font-weight-bold" scope="col">User ID</th>        
      <th class="font-weight-bold" scope="col">Status</th>
      <th class="font-weight-bold" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <th scope="row">{{ $list->id }}</th>
      <td >  {{ $list->order_id }}</td>          
      <td >  {{ $list->product_id }}</td>       
      <td >  {{ $list->user_id }}</td> 
      <td> 
       @if($list->status==1)
      <a href="{{ url('admin/orderstatus/0') }}/{{$list->id}}" class="btn btn-sm btn-warning">Active</a>
      @else
      <a href="{{ url('admin/orderstatus/1') }}/{{$list->id}}" class="btn btn-sm btn-info">Deactive</a>
      @endif
      </td>

      <td>
        <a href="{{ url('admin/orderdetails')}}/{{$list->id}}" class="btn btn-sm btn-success">Details</a>
      </td>
      <td>
      <form action=" {{url('admin/deleteorder')}}/{{$list->id}}"  method="post" onsubmit=" return confirmdelete()" >
         @csrf 
         @method('Delete')
         <input type="submit" value="Delete" class="btn btn-sm btn-danger " style="margin-top: 23px;" >
         </form>
        
        
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
</div>
<script>
  function confirmdelete(){
    return confirm('Are you sure you want to Delete this Order?');
  }
</script>

@endsection