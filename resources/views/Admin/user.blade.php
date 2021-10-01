@extends('layout/master')
@section('user_select','active')
@section('page_title','Users')
@section('content')

<div class="jumbotron" style="margin-top: 100px;">
  <h1 class="display-3">Users</h1>
  
  <hr class="my-2">
 
  
  
  <div class="table-responsive">
<table class="table table-striped table-secondary" >
  <thead>
    <tr class="">
      <th class="font-weight-bold" scope="col">ID</th>
      <th class="font-weight-bold" scope="col">First Name</th>     
      <th class="font-weight-bold" scope="col">Last Name</th>   
      <th class="font-weight-bold" scope="col">Username</th> 
      <th class="font-weight-bold" scope="col">Password</th>      
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <th scope="row">{{ $list->id }}</th>
      <td >  {{ $list->fname }} </td>
      <td>{{ $list->lname }}</td>      
      <td >  {{ $list->username }}</td>    
      <td >  {{ $list->password }}</td>              
        
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
  </div>
</div>

@endsection