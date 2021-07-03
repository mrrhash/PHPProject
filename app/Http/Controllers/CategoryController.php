<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Category::all();
        return view('Admin.category',$result);
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
            'category'=>'required',
            'category_slug'=>'required',
        ]);
        $category = $request->post('category');
        $category_slug = $request->post('category_slug');

        $model = new Category();

        $model->category=$category;
        $model->category_slug=$category_slug;
        $model->status=1;
        $model->save();
        $request->session()->flash('msg',"Category Inserted");
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Category::find($id);
        return view('Admin.editcategory')->with('data',$model);
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
            'category'=>'required',
            'category_slug'=>'required',
        ]);
        $category = $request->post('category');
        $category_slug = $request->post('category_slug');

        $model=Category::find($id);

        $model->category=$category;
        $model->category_slug=$category_slug;
        $model->save();
        $request->session()->flash('msg',"Category Updated");
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('msg',"Category Deleted!");
        return redirect('admin/categories');
    }
    public function status(Request $request,$status,$id)
    {
        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Category Status Updated!");
        return redirect('admin/categories');
    }
}
