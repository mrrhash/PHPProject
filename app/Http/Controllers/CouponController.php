<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= Coupon::all();
        return view('Admin.coupon',$result);
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
            'coupon_title'=>'required',
            'coupon_code'=>'required|unique:coupons,coupon_code',
            'coupon_value'=>'required',

        ]);

        $coupon_title = $request->post('coupon_title');
        $coupon_code = $request->post('coupon_code');
        $coupon_value = $request->post('coupon_value');

        $model = new Coupon();

        $model->coupon_title=$coupon_title;
        $model->coupon_code=$coupon_code;
        $model->coupon_value=$coupon_value;
        $model->status=1;
        $model->save();

        $request->session()->flash('msg','Coupon Inserted');
        return redirect('admin/coupon');
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
        $model = Coupon::find($id);
        return view('Admin.editcoupon')->with('data',$model);
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
            'coupon_title'=>'required',
            'coupon_code'=>'required|unique:coupons,coupon_code',
            'coupon_value'=>'required',

        ]);

        $coupon_title = $request->post('coupon_title');
        $coupon_code = $request->post('coupon_code');
        $coupon_value = $request->post('coupon_value');

        $model = Coupon::find($id);

        $model->coupon_title=$coupon_title;
        $model->coupon_code=$coupon_code;
        $model->coupon_value=$coupon_value;
        
        $model->save();

        $request->session()->flash('msg','Coupon Updated');
        return redirect('admin/coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Coupon::find($id);
        $model->delete();
        
        $request->session()->flash('msg',"Coupon Deleted!");
        return redirect('admin/coupon');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Coupon::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('msg',"Coupon Status Updated!");
        return redirect('admin/coupon');
    }
}
