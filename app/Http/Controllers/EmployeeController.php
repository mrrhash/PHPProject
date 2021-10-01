<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= Employee::all();
        return view('Admin.employee',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'fname'=>'required',
            'lname'=>'required',
            'gmail'=>'required',
            'username'=>'required|unique:employees,username',
            'password'=>'required',
            'city'=>'required',
            'region'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'jobtitle'=>'required',
           

        ]);

        $fname = $request->post('fname');
        $lname = $request->post('lname');
        $gmail = $request->post('gmail');
        $username = $request->post('username');
        $password = $request->post('password');
        $contact = $request->post('contact');
        $city = $request->post('city');
        $address = $request->post('address');
        $region = $request->post('region');
        $jobtitle = $request->post('jobtitle');
      

        $model = new Employee();

        $model->fname=$fname;   
        $model->lname=$lname;     
        $model->gmail=$gmail;
        $model->username=$username;
        $model->password=$password;
        $model->contact=$contact;
        $model->city=$city;
        $model->address=$address;
        $model->region=$region;
        $model->jobtitle=$jobtitle;
       
        $model->save();

        $request->session()->flash('msg','Employee Inserted');
        return redirect('admin/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Employee::find($id);
        return view('Admin.editemployee')->with('data',$model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
            'fname'=>'required',
            'lname'=>'required',
            'gmail'=>'required',
            'username'=>'required|unique:employees,username,'.$id,
            'password'=>'required',
            'city'=>'required',
            'region'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'jobtitle'=>'required',

        ]);

        $fname = $request->post('fname');
        $lname = $request->post('lname');
        $gmail = $request->post('gmail');
        $username = $request->post('username');
        $password = $request->post('password');
        $contact = $request->post('contact');
        $city = $request->post('city');
        $address = $request->post('address');
        $region = $request->post('region');
        $jobtitle = $request->post('jobtitle');
       
        $model = Employee::find($id);

       
        $model->fname=$fname;   
        $model->lname=$lname;     
        $model->gmail=$gmail;
        $model->username=$username;
        $model->password=$password;
        $model->contact=$contact;
        $model->city=$city;
        $model->address=$address;
        $model->region=$region;
        $model->jobtitle=$jobtitle;
       
        
        $model->save();

        $request->session()->flash('msg','Employee Updated');
        return redirect('admin/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Employee::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Employee Deleted!");
        return redirect('admin/employee');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Employee::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Employee Status Updated!");
        return redirect('admin/employee');
    }
}
