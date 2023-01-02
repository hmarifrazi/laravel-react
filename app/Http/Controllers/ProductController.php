<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Traits\ResponseTrait;

use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Productimage;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Exception;
use Session;
use Illuminate\Support\Facades\Log;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$product = Product::paginate(10);
        //return view('backend.products.index', compact('product'));
        return  Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $category = Category::get(['id', 'name']);
        $manufacturer = Manufacturer::get(['id', 'name']);
        $subcategory = SubCategory::get(['id', 'name']);
        return view('backend.products.create', compact('products', 'category', 'manufacturer', 'subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data['name'] = $request->name;
        $data['sku'] = $request->sku;
        $data['model_no'] = $request->model_no;
        $data['product_title'] = $request->product_title;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['feature_image'] = $request->feature_image;
        $data['short_description'] = $request->short_description;
        $data['long_description'] = $request->long_description;
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['vat_status'] = $request->vat_status;
        $data['warranty'] = $request->warranty;
        $data['product_condition'] = $request->product_condition;
        $data['qty'] = $request->qty;
        $data['max_qty'] = $request->max_qty;
        // $data['manufacturer_id'] = $request->manufacturer;
        // $data['category_id'] = $request->category;
        // $data['subcategory_id'] = $request->subcategory;

        if ($request->hasFile('feature_image')) {
            $imageName = rand(111, 999) . time() . '.' . $request->feature_image->extension();
            $request->feature_image->move(public_path('uploads/product'), $imageName);
            $data['feature_image'] = $imageName;
        }

        Product::create($data);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {

        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = Manufacturer::all();
        $category = Category::all();
        $subcategory = SubCategory::all();
        // $subcategory=Subcategory::where('category_id',$products->category_id)->get();
        // return view('products.edit',compact('products','manufacturer','category','subcategory'));

        $p = Product::findOrFail($id);
        return view('backend.products.edit', compact('p', 'category', 'manufacturer', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $p = Product::findOrFail($id);
            // dd($p);
            $p->name = $request->name;
            $p->sku = $request->sku;
            $p->model_no = $request->model_no;
            $p->product_title = $request->product_title;
            $p->feature_image = $request->imageName;
            $p->short_description = $request->short_description;
            $p->long_description = $request->long_description;
            $p->price = $request->price;
            $p->discount = $request->discount;
            $p->vat_status = $request->vat_status;
            $p->warranty = $request->warranty;
            $p->product_condition = $request->product_condition;
            $p->qty = $request->qty;
            $p->max_qty = $request->max_qty;
            $p->manufacturer_id = $request->manufacturer;
            $p->category_id = $request->category;
            $p->subcategory_id = $request->subcategory;
            if ($request->hasFile('feature_image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->feature_image->extension();
                $request->feature_image->move(public_path('uploads/product'), $imageName);
                $p['feature_image'] = 'uploads/product/' . $imageName;
            }
            if ($p->save()) {
                return redirect(route('products.index'));
            }
        } catch (Exception $e) {

            //  dd($e);
            if ($p->save()) {
                return redirect(route('products.index'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $p)
    {
        // $p->delete();
        // return redirect(route('products.index'));
    }
}
