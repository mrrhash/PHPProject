<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Product::all();
        return view('Admin.product',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $result['category_name'] = DB::table('categories')->where(['status'=>1])->get();
    //    echo "<pre>";
    //  print_r($result['category_name']);
    //     echo "</pre>";
    //     die();

        $result['brand_name'] = DB::table('brands')->where(['status'=>1])->get();
    //    echo "<pre>";
    //  print_r($result['brand_name']);
    //     echo "</pre>";
    //     die();

    return view('admin/addproduct',$result);
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
            'product'=>'required',
            'product_slug'=>'required',
        ]);
        $product = $request->post('product');
        $product_slug = $request->post('product_slug');

        $model = new Product();

        $model->product=$product;
        $model->product_slug=$product_slug;
        $model->status=1;
        $model->save();
        $request->session()->flash('msg',"Product Inserted");
        return redirect('admin/products');
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
        $model=Product::find($id);
        return view('Admin.editproduct')->with('data',$model);
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
            'product'=>'required',
            'product_slug'=>'required',
        ]);
        $product = $request->post('product');
        $product_slug = $request->post('product_slug');

        $model=Product::find($id);

        $model->product=$product;
        $model->product_slug=$product_slug;
        $model->save();
        $request->session()->flash('msg',"Product Updated");
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model = Product::find($id);
        $model->delete();
        $request->session()->flash('msg',"Product Deleted!");
        return redirect('admin/products');
    }
    public function status(Request $request,$status,$id)
    {
        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Product Status Updated!");
        return redirect('admin/products');
    }
}
