<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Session;


class CategoryController extends Controller
{


    /**


     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {


        $cat = new Category;
        $cat->name = $r->FullName;
        $cat->is_game = $r->is_game;
        $cat->feature_cat = $r->featured;
        $cat->show_catpage = $r->catpage;
        $cat->cat_page_order = $r->order;



        if ($r->cat_icon) {
            $imageName = rand(111, 999) . time() . '.' . $r->cat_icon->extension();
            $r->cat_icon->move(public_path('uploads/category'), $imageName);
            $cat->cat_icon = $imageName;
        }

        if ($r->cat_img) {
            $imageName = rand(111, 999) . time() . '.' . $r->cat_img->extension();
            $r->cat_img->move(public_path('uploads/category'), $imageName);
            $cat->cat_image = $imageName;
        }

        if ($r->feature_image) {
            $imageName = rand(111, 999) . time() . '.' . $r->feature_image->extension();
            $r->feature_image->move(public_path('uploads/category'), $imageName);
            $cat->feature_image = $imageName;
        }

        if ($r->lsb_image) {
            $imageName = rand(111, 999) . time() . '.' . $r->lsb_image->extension();
            $r->lsb_image->move(public_path('uploads/category'), $imageName);
            $cat->Isb_image = $imageName;
        }

        // if($r->image){
        //     $imageName = rand(111,999).time().'.'.$r->image->extension();
        //     $r->image->move(public_path('uploads/category'), $imageName);
        //     $cat->image[]=$imageName;
        // }
        $cat->save();
        return redirect(route('category.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, category $category)
    {

        $category->name = $r->FullName;
        $category->is_game = $r->is_game;
        $category->feature_cat = $r->featured;
        $category->show_catpage = $r->catpage;
        $category->cat_page_order = $r->order;


        if ($r->cat_icon) {
            $imageName = rand(111, 999) . time() . '.' . $r->cat_icon->extension();
            $r->cat_icon->move(public_path('uploads/category'), $imageName);
            $category->cat_icon = $imageName;
        }

        if ($r->cat_img) {
            $imageName = rand(111, 999) . time() . '.' . $r->cat_img->extension();
            $r->cat_img->move(public_path('uploads/category'), $imageName);
            $category->cat_image = $imageName;
        }

        if ($r->feature_image) {
            $imageName = rand(111, 999) . time() . '.' . $r->feature_image->extension();
            $r->feature_image->move(public_path('uploads/category'), $imageName);
            $category->feature_image = $imageName;
        }

        if ($r->lsb_image) {
            $imageName = rand(111, 999) . time() . '.' . $r->lsb_image->extension();
            $r->lsb_image->move(public_path('uploads/category'), $imageName);
            $category->lsb_image = $imageName;
        }


        $category->save();
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
