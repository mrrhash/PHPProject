<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= Color::all();
        return view('Admin.color',$result);
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
           
            'color'=>'required|unique:colors,color',
           

        ]);

        $color = $request->post('color');
      

        $model = new Color();

        $model->color=$color;        
        $model->status=1;
        $model->save();

        $request->session()->flash('msg','Color Inserted');
        return redirect('admin/color');
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
        $model = Color::find($id);
        return view('Admin.editcolor')->with('data',$model);
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
            
            'color'=>'required|unique:colors,color',
            

        ]);

        $color = $request->post('color');
       
        $model = Color::find($id);

        $model->color=$color;
       
        
        $model->save();

        $request->session()->flash('msg','Color Updated');
        return redirect('admin/color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Color::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Color Deleted!");
        return redirect('admin/color');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Color Status Updated!");
        return redirect('admin/color');
    }
}
