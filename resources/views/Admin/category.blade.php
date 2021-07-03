@extends('layout/master')
@section('page_title','Category')
@section('category_select','active')
@section('content')

<div class="jumbotron" style="margin-top: 100px;">
  <h1 class="display-3">Categories</h1>
  
  <hr class="my-2">
 
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ url('admin/addcategory') }}" role="button">Add Category</a>
  </p>
  @if(session('msg'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ session('msg') }}
  </div>
  @endif
<table class="table table-striped table-secondary" >
  <thead>
    <tr class="">
      <th class="font-weight-bold" scope="col">ID</th>
      <th class="font-weight-bold" scope="col">Category</th>
      <th class="font-weight-bold" scope="col">Category Slug</th>
      <th class="font-weight-bold" scope="col">Status</th>
      <th class="font-weight-bold" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <th scope="row">{{ $list->id }}</th>
      <td >{{ $list->category }}</td>
      <td>{{ $list->category_slug }}</td>
      <td> 
       @if($list->status==1)
      <a href="{{ url('admin/categorystatus/0') }}/{{$list->id}}" class="btn btn-sm btn-warning">Active</a>
      @else
      <a href="{{ url('admin/categorystatus/1') }}/{{$list->id}}" class="btn btn-sm btn-info">Deactive</a>
      @endif
      </td>

      <td>
        <a href="{{ url('admin/editcategory')}}/{{$list->id}}" class="btn btn-sm btn-success">Edit</a>
      </td>
      <td>
        <form action=" {{url('admin/deletecategory')}}/{{$list->id}}"  method="post" onsubmit=" return confirmdelete()" >
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
<script>
  function confirmdelete(){
    return confirm('Are you sure you want to Delete this Category?');
  }
</script>
@endsection