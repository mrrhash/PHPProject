@extends('layout/master')
@section('page_title','Employee')
@section('employee_select','active')
@section('content')

<div class="jumbotron bg-dark" style="margin-top: 100px;">
    <h1 class="display-3 text-center text-white">Add Employee</h1><br>
    <div class="row">
    <div class="col-3"></div>
    <form action="{{ url('admin/storeemployee') }}" class="col-6" method="post">
        @csrf
        @method('post')
        <input type="text" class="form-control" placeholder="First Name..." name="fname">
        @error('fname')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Last Name..." name="lname">
        @error('lname')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Gmail..." name="gmail">
        @error('gmail')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="City..." name="city">
        @error('city')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="State..." name="state">
        @error('state')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Address..." name="address">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <input type="text" class="form-control" placeholder="Job Title..." name="jobtitle">
        @error('jobtitle')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        
        
        <input type="submit" name="" id="" value="Add" class="btn btn-success btn-sm">

        <a href="employee" class="btn btn-secondary btn-sm text-white float-right">Back</a>

        
    </form>
    </div>
</div>
@endsection