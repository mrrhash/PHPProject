@extends('layout/master')
@section('payment_type_select','active')
@section('page_title','Payment Types')
@section('content')

<div class="jumbotron" style="margin-top: 100px;">
  <h1 class="display-3">Payment Types</h1>
  
  <hr class="my-2">
 
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ url('admin/addpayment_type') }}" role="button">Add Payment Types</a>
  </p>
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
      <th class="font-weight-bold" scope="col">Payment Types</th>      
      <th class="font-weight-bold" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <th scope="row">{{ $list->id }}</th>
      <td >{{ $list->name }}</td>     

      <td>
        <a href="{{ url('admin/editpayment_type')}}/{{$list->id}}" class="btn btn-sm btn-success">Edit</a>
      </td>
      <td>
      <form action=" {{url('admin/deletepayment_type')}}/{{$list->id}}"  method="post" onsubmit=" return confirmdelete()" >
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
    return confirm('Are you sure you want to Delete this Payment Types?');
  }
</script>

@endsection