<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Exception;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::paginate(10);
        return view('backend.subcategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get(['id', 'name']);
        // dd($subcategory);

        return view('backend.subcategory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $subcat = new Subcategory;
            $subcat->name = $request->FullName;
            $subcat->category_id = $request->category;


            if ($request->hasFile('cat_icon')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cat_icon->extension();
                $request->cat_icon->move(public_path('uploads/subcategory'), $imageName);
                $subcat->cat_icon = $imageName;
            }


            if ($subcat->save()) {
                return redirect('subcategory')->with('success', 'Data saved');
            }
        } catch (Exception $e) {

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $cat = SubCategory::all();
        return view('backend.subcategory.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        try {

            $s = new Subcategory;
            $s->name = $request->name;
            $s->category_id = $request->name;
            $s->FullName = $request->name;


            if ($request->hasFile('cat_icon')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cat_icon->extension();
                $request->cat_icon->move(public_path('uploads/subcategory'), $imageName);
                $s->cat_icon = $imageName;
            }
        } catch (Exception $e) {

            return back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
