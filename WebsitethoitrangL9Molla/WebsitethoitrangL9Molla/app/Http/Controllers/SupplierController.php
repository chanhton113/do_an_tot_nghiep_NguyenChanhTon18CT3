<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::where('status','active')->orderBy('id','DESC')->paginate(5);
        return view('backend.supplier.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string',
            'slug'=>'string',
            'address'=>'string',
            'phone'=>'string',
            'email'=>'string',
            'status'=>'required',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Supplier::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,9999);
        }
        $data['slug']=$slug;
        $status=Supplier::create($data);
        if($status){
            request()->session()->flash('success','Lưu dữ liệu thành công');
        }else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu');
        }
        return redirect()->route('supplier.index');
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
        $supplier=Supplier::findOrFail($id);
        return view('backend.supplier.edit')->with('supplier',$supplier);
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
        $supplier=Supplier::findorFail($id);
        $this->validate($request,[
            'title'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'status'=>'required',
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->title);
        // $count=Supplier::where('slug',$slug)->count();
        // if($count>0){
        //     $slug=$slug.'-'.date('ymdis').'-'.rand(0,9999);
        // }
        // $data['slug']=$slug;
        $status=$supplier->fill($data)->save();
        if($status){
            request()->session()->flash('success','Lưu dữ liệu thành công');
        }else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu!');
        }
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::findOrFail($id);
        $status=$supplier->delete();
        if($status){
            request()->session()->flash('success','Xóa thành công!');
        }else{
            request()->session()->flash('error','Đã xảy ra lỗi không thể xóa dữ liệu!');
        }
        return redirect()->route('supplier.index');  
    }
}
