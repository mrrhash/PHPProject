<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'product_slug'=>'required|unique:products,product_slug',
            'product_image'=>'required|mimes:jpeg,jpg,png',
        ]);
       
        

        $category_id = $request->post('category_id');
        $product_name = $request->post('product_name');
        $product_slug = $request->post('product_slug');
        $brand_id = $request->post('brand_id');
        $product_model = $request->post('product_model');
        $product_shortdesc = $request->post('product_shortdesc');
        $product_desc = $request->post('product_desc');
        $product_keywords = $request->post('product_keywords');
        $product_technical_spec = $request->post('product_technical_spec');
        $product_uses = $request->post('product_uses');
        $product_warranty = $request->post('product_warranty');

        $model = new Product();

        if($request->hasFile('product_image')){
            $product_image = $request->file('product_image');
            $extension = $product_image->extension();
            $image_name = time().'.'.$extension;
            $product_image->storeAs('/public/media',$image_name);
            $model->product_image=$image_name;  
        }
       
        $model->category_id=$category_id;
        $model->product_name=$product_name;
        $model->product_slug=$product_slug;
        $model->brand_id=$brand_id;
        $model->product_model=$product_model;
        $model->product_shortdesc=$product_shortdesc;
        $model->product_desc=$product_desc;
        $model->product_keywords=$product_keywords;
        $model->product_technical_spec=$product_technical_spec;
        $model->product_uses=$product_uses;
        $model->product_warranty=$product_warranty;
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
    
        $model=Product::find($id);
        //for selected category 
        $data=$model->category_id;
        $model2 = Category::find($data);
        

         //for selected brand 
         $data2=$model->brand_id;
         $model3 = Brand::find($data2);
         
        return view('Admin.editproduct',$result)->with('data',$model)->with('data2',$model2)->with('data3',$model3);
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
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'product_slug'=>'required',
            'product_image'=>'required|mimes:jpeg,jpg,png',
        ]);
       
        

        $category_id = $request->post('category_id');
        $product_name = $request->post('product_name');
        $product_slug = $request->post('product_slug');
        $brand_id = $request->post('brand_id');
        $product_model = $request->post('product_model');
        $product_shortdesc = $request->post('product_shortdesc');
        $product_desc = $request->post('product_desc');
        $product_keywords = $request->post('product_keywords');
        $product_technical_spec = $request->post('product_technical_spec');
        $product_uses = $request->post('product_uses');
        $product_warranty = $request->post('product_warranty');

        $model = Product::find($id);

        if($request->hasFile('product_image')){
            $product_image = $request->file('product_image');
            $extension = $product_image->extension();
            $image_name = time().'.'.$extension;
            $product_image->storeAs('/public/media',$image_name);
            $model->product_image=$image_name;  
        }
       
        $model->category_id=$category_id;
        $model->product_name=$product_name;
        $model->product_slug=$product_slug;
        $model->brand_id=$brand_id;
        $model->product_model=$product_model;
        $model->product_shortdesc=$product_shortdesc;
        $model->product_desc=$product_desc;
        $model->product_keywords=$product_keywords;
        $model->product_technical_spec=$product_technical_spec;
        $model->product_uses=$product_uses;
        $model->product_warranty=$product_warranty;
        $model->status=1;
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
    public function destroy(Request $request,$id)
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
