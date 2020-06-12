<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){

        $products = DB::table('products')->get();

        return view('product.index', compact('products'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if ($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;

            $uploadPath = 'public/media/';
            $image_url = $uploadPath.$image_full_name;
            $success = $image->move($uploadPath,$image_full_name);

            $data['logo'] = $image_url;
            $product = DB::table('products')->insert($data);

            return redirect()->route('product.index')
                                ->with('success','Product Created Successfully');
        }


    }

    public function edit($id){

        $product = DB::table('products')->where('id',$id)->first();

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id){

        $oldLogo = $request->old_logo;

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if ($image){
            unlink($oldLogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;

            $uploadPath = 'public/media/';
            $image_url = $uploadPath.$image_full_name;
            $success = $image->move($uploadPath,$image_full_name);

            $data['logo'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);

            return redirect()->route('product.index')
                ->with('success','Product Updated Successfully');
        }

    }

    public function delete($id){
        $data = DB::table('products')->where('id',$id)->first();
        $image = $data->logo;
        unlink($image);

        $product = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('product.index')
            ->with('success','Product Delete Successfully');

    }

    public function show($id){
        $data = DB::table('products')->where('id',$id)->first();
        return view('product.show',compact('data'));
    }

}
