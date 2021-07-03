<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= Size::all();
        return view('Admin.size',$result);
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
           
            'size'=>'required|unique:sizes,size',
           

        ]);

        $size = $request->post('size');
      

        $model = new Size();

        $model->size=$size;        
        $model->status=1;
        $model->save();

        $request->session()->flash('msg','Size Inserted');
        return redirect('admin/size');
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
        $model = Size::find($id);
        return view('Admin.editsize')->with('data',$model);
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
            
            'size'=>'required|unique:sizes,size',
            

        ]);

        $size = $request->post('size');
       
        $model = Size::find($id);

        $model->size=$size;
       
        
        $model->save();

        $request->session()->flash('msg','Size Updated');
        return redirect('admin/size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Size::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Size Deleted!");
        return redirect('admin/size');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Size::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Size Status Updated!");
        return redirect('admin/size');
    }
}
