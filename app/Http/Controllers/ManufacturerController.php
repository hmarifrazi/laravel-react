<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Manufacturer\CreateRequest;
use App\Http\Requests\Manufacturer\UpdateRequest;


use App\Models\Manufacturer;
use Exception;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::paginate(10);
        return view('backend.manufacturer.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manufacturer.create');
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
            $image = $request->file('image');
            $imageName = '/public/images/' . time() . '.' . $image->extension();
            $manufacturer = new Manufacturer;
            $manufacturer->name = $request->name;
            $manufacturer->email = $request->email;
            $manufacturer->contact = $request->contact;
            $manufacturer->address = $request->address;
            $manufacturer->image = $imageName;
            $manufacturer->created_by = ('user');
            $manufacturer->updated_by = ('user');
            if ($manufacturer->save()) {
                $image->move(public_path('images'), $imageName);
                return redirect(route('manufacturer.index'));
            }
        } catch (Exception $e) {
            dd($e);
            return redirect(route('manufacturer.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
      return view('backend.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
       try{
            $manufacturer->name=$request->name;
            $manufacturer->contact=$request->contact;
            $manufacturer->address=$request->address;
            $manufacturer->email=$request->email;
            $image=$request->file('image');
            if($image){
                $imageName = '/public/images/'.time().'.'.$image->extension();
                if(file_exists(public_path("$manufacturer->image"))){
                     unlink(public_path("$manufacturer->image"));
               }
               $manufacturer->image=$imageName;
           }
           if($manufacturer->save()){
            if($image){
                $image->move(public_path('images'),$imageName);
            }
            return redirect(route('manufacturer.index'));
           }

        }catch(Exception $e){
            dd($e);
            return redirect(route('manufacturer.edit'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
    }
}
