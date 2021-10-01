<?php

namespace App\Http\Controllers;

use App\Models\Delivery_type;
use Illuminate\Http\Request;

class DeliveryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= Delivery_Type::all();
        return view('Admin.delivery_type',$result);
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
            
            'name'=>'required|unique:delivery_types,name',
            

        ]);

        $name = $request->post('name');       

        $model = new Delivery_Type();

        $model->name=$name;      
        $model->save();

        $request->session()->flash('msg','Delivery_Type Inserted');
        return redirect('admin/delivery_type');
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
        $model = Delivery_Type::find($id);
        return view('Admin.editdelivery_type')->with('data',$model);
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
            'name'=>'required|unique:delivery_types,name',

        ]);

        $name = $request->post('name');
        

        $model = Delivery_Type::find($id);

        $model->name=$name;        
        
        $model->save();

        $request->session()->flash('msg','Delivery_Type Updated');
        return redirect('admin/delivery_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Delivery_Type::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Delivery_Type Deleted!");
        return redirect('admin/delivery_type');
    }
  
}
