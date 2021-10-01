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
            'product_name'=>'required',
            'stock'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);
       
        

        $category_id = $request->post('category_id');
        $product_name = $request->post('product_name');       
        $stock = $request->post('stock');
        $price = $request->post('price');
        $description = $request->post('description');
        
       
        $model = new Product();

        if($request->hasFile('image')){
            $product_image = $request->file('image');
            $extension = $product_image->extension();
            $image_name = time().'.'.$extension;
            $product_image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
         
        $model->product_code=22;
        $model->product_number=12345;
        $model->product_id=$model->product_code.$model->product_number;
        $model->category_id=$category_id;
        $model->product_name=$product_name;
        $model->description=$description;
        $model->price=$price;
        $model->stock=$stock;        
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
    
          
    
        $model=Product::find($id);
        //for selected category 
        $data=$model->category_id;
        $model2 = Category::find($data);      

        
         
        return view('Admin.editproduct',$result)->with('data',$model)->with('data2',$model2);
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
            'product_name'=>'required',
            'stock'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);
       
        

        $category_id = $request->post('category_id');
        $product_name = $request->post('product_name');       
        $stock = $request->post('stock');
        $price = $request->post('price');
        $description = $request->post('description');

        $model = Product::find($id);

        if($request->hasFile('image')){
            $product_image = $request->file('image');
            $extension = $product_image->extension();
            $image_name = time().'.'.$extension;
            $product_image->storeAs('/public/media',$image_name);
             
        }
        $model->image=$image_name;
        $model->product_id=$model->product_code.$model->product_number;
        $model->category_id=$category_id;
        $model->product_name=$product_name;
        $model->description=$description;
        $model->price=$price;
        $model->stock=$stock;        
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
