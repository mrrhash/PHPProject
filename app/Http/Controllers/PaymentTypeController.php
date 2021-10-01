<?php

namespace App\Http\Controllers;

use App\Models\Payment_type;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= Payment_Type::all();
        return view('Admin.payment_type',$result);
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
            
            'name'=>'required|unique:payment_types,name',
            

        ]);

        $name = $request->post('name');       

        $model = new Payment_Type();

        $model->name=$name;      
        $model->save();

        $request->session()->flash('msg','Payment_Type Inserted');
        return redirect('admin/payment_type');
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
        $model = Payment_Type::find($id);
        return view('Admin.editpayment_type')->with('data',$model);
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
            'name'=>'required|unique:payment_types,name',

        ]);

        $name = $request->post('name');
        

        $model = Payment_Type::find($id);

        $model->name=$name;        
        
        $model->save();

        $request->session()->flash('msg','Payment_Type Updated');
        return redirect('admin/payment_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Payment_Type::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Payment_Type Deleted!");
        return redirect('admin/payment_type');
    }
  
}
