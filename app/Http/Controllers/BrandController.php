<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Brand::all();
        return view('Admin.brand',$result);
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
           
            'brand'=>'required',
            'brand_slug'=>'required|unique:brands,brand_slug',
           

        ]);

        $brand = $request->post('brand');
        $brand_slug = $request->post('brand_slug');
      

        $model = new Brand();

        $model->brand=$brand;        
        $model->brand_slug=$brand_slug;        
        $model->status=1;
        $model->save();

        $request->session()->flash('msg','Brand Inserted');
        return redirect('admin/brand');
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
        $model = Brand::find($id);
        return view('Admin.editbrand')->with('data',$model);
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
            
            'brand'=>'required',
            'brand_slug'=>'required|unique:brands,brand_slug',
            

        ]);

        $brand = $request->post('brand');
        $brand_slug = $request->post('brand_slug');
       
        $model = Brand::find($id);

        $model->brand=$brand;
        $model->brand_slug=$brand_slug;        
       
        
        $model->save();

        $request->session()->flash('msg','Brand Updated');
        return redirect('admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Brand::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Brand Deleted!");
        return redirect('admin/brand');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Brand::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Brand Status Updated!");
        return redirect('admin/brand');
    }
}
