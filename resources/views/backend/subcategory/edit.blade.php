@extends('layout.app')
@section('content')



<form action="{{route('subcategory.update')}}" class="col-lg-8 offset-3" method='post' enctype="multipart/form-data">
    @csrf
    method('patch')
    <div class="card">
        <div class="card-header"><strong>Add New Category</strong>
            

           @forelse($cat as $s_cat)
            
            
        <div class="card-body card-block">
            <div class="form-group">
                <label for="FullName" value={{old('FullName',$s_cat->name)}} class=" form-control-label">Name</label>
                <input type="text" id="FullName" name="FullName" placeholder="category name" class="form-control">
            </div>

           


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label" for="category" >Category Name </label>
                <div class="col-md-6">
                   <select class="form-control" name="category" id="category">
                        <option value="">Select Category</option>
                        @forelse($cat as $s_cat)

                        <option value="{{$s_cat->id}}" {{ old('category')==$s_cat->id?"selected":""}}>{{
                        $s_cat->category}}</option>
                    @empty
                            <option value="">No Category found</option>
                    @endforelse

                   </select>

                   @if($errors->has('Category'))
                        <span class="text-danger"> {{ $errors->first('category')}}</span>
                    @endif
                   
                </div>
            </div>



                    <div class="form-group row">
                        <label for="cat_icon" class="col-sm-3 col-form-label">Icon</label>
                        <div class="col-sm-9">
                            <input type="file" class="dropify" id="cat_icon" data-height="100" name="cat_icon"/>

                            @if($errors->has('cat_icon'))
                                <span class="text-danger">{{$errors->first('cat_icon') }} </span>
                            @endif
                        </div>
                    </div> 

                       
                    <div class="form-group row">
                        <div class="col-12">
                            <h4 class="header-title mt-0 mb-3">Upload Sub Category Image</h4>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-3">
                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                        </div><!-- end col -->
                        <div class="col-sm-3">
                            <input type="file" class="dropify" data-height="300" name="image[]"/>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <input type="file" class="dropify" data-height="300" name="image[]"/>
                </div><!-- end col -->
                <div class="col-sm-3">
                    <input type="file" class="dropify" data-height="300" name="image[]"/>
            </div><!-- end col -->
                    </div>

                   


                    
<!-- 
            <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="file" class="dropify" data-height="200" name="image[]"/>
                        </div> -->
                        <!-- end col -->

                        <!-- <div class="col-sm-6">
                            <input type="file" class="dropify" data-height="200" name="image[]"/>
                       </div> -->
                       <!-- end col -->
                     <!-- </div> -->
            <!-- <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="file" class="dropify" data-height="200" name="image[]"/>
                    </div> -->
                    
                    <!-- end col -->

                     <!-- <div class="col-sm-6">
                        <input type="file" class="dropify" data-height="200" name="image[]"/>
                    </div> -->
                    <!-- end col -->
             </div>



              <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </div>
    </div>
</form>
 @endsection