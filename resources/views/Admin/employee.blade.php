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
<table class="table table-striped table-secondary" >
  <thead>
    <tr class="">
      <th class="font-weight-bold" scope="col">ID</th>
      <th class="font-weight-bold" scope="col">Employee Name</th>    
      <th class="font-weight-bold" scope="col">Gmail</th>   
      <th class="font-weight-bold" scope="col">DateHired</th> 
      <th class="font-weight-bold" scope="col">City</th> 
      <th class="font-weight-bold" scope="col">State</th> 
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
      <td >  {{ $list->created_at }}</td>      
      <td >  {{ $list->city }}</td> 
      <td >  {{ $list->state }}</td> 
      <td >  {{ $list->adress }}</td> 
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
<script>
  function confirmdelete(){
    return confirm('Are you sure you want to Delete this Employees?');
  }
</script>

@endsection