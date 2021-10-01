@extends('layout/master')
@section('employee_select','active')
@section('page_title','Employees')
@section('content')

<div class="jumbotron" style="margin-top: 100px;">
  <h1 class="display-3">Employeess</h1>
  
  <hr class="my-2">
 
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ url('admin/addemployee') }}" role="button">Add Employees</a>
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
      <th class="font-weight-bold" scope="col">Name</th>     
      <th class="font-weight-bold" scope="col">Gmail</th>   
      <th class="font-weight-bold" scope="col">Username</th> 
      <th class="font-weight-bold" scope="col">Password</th>
      <th class="font-weight-bold" scope="col">City</th> 
      <th class="font-weight-bold" scope="col">Region</th> 
      <th class="font-weight-bold" scope="col">Contact</th>
      <th class="font-weight-bold" scope="col">Address</th>
      <th class="font-weight-bold" scope="col">Job Title</th>
      <th class="font-weight-bold" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <th scope="row">{{ $list->id }}</th>
      <td >  {{ $list->fname }} {{ $list->lname }}</td>
      <td >  {{ $list->gmail }}</td>
      <td >  {{ $list->username }}</td>    
      <td >  {{ $list->password }}</td>    
      <td >  {{ $list->city }}</td> 
      <td >  {{ $list->region }}</td>
      <td >  {{ $list->contact }}</td>   
      <td >  {{ $list->address }}</td> 
      <td >  {{ $list->jobtitle }}</td> 
      
      <td>
        <a href="{{ url('admin/editemployee')}}/{{$list->id}}" class="btn btn-sm btn-success">Edit</a>
      </td>
      <td>
      <form action=" {{url('admin/deleteemployee')}}/{{$list->id}}"  method="post" onsubmit=" return confirmdelete()" >
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
    return confirm('Are you sure you want to Delete this Employees?');
  }
</script>

@endsection