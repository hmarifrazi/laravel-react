@extends('layout.app')
@section('content')



<form action="{{route('category.update',$category)}}" class="col-lg-8 offset-3" method='post' enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-header"><strong>Add New Category</strong>
            

           
            
            
        <div class="card-body card-block">
            <div class="form-group">
                <label for="FullName" class=" form-control-label">Name</label>
                <input type="text" id="FullName" name="FullName" value="{{ $category->name }}" placeholder="category name" class="form-control">
            </div>

           


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label" for="is_game">For Games? </label>
                <div class="col-md-6">
                    <div class="radio radio-info radio-info form-check-inline ">
                        <input type="radio" id="is_game" value="1" name="is_game">
                        <label for="is_game">YES</label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="is_game1" value="0" name="is_game" checked>
                        <label for="is_game1">NO</label>
                    </div>
                </div>
            </div>


           


            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label" for="featured">Featured? </label>
                <div class="col-md-6">
                    <div class="radio radio-info radio-info form-check-inline ">
                        <input type="radio" id="featured" value="1" name="featured">
                        <label for="featured">YES</label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="featured" value="0" name="featured" checked>
                        <label for="featured">NO</label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label" for="catpage">Show Category Page? </label>
                <div class="col-md-6">
                    <div class="radio radio-info radio-info form-check-inline ">
                        <input type="radio" id="catpage" value="1" name="catpage">
                        <label for="catpage">YES</label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="catpage" value="0" name="catpage" checked>
                        <label for="catpage">NO</label>
                    </div>
                </div>
            </div>

                

                    <div class="form-group">
                        <label for="order" class=" form-control-label">Showing Order In Category Page</label>
                        <input type="text" name="order" value="{{ $category->cat_page_order }}" id="order" placeholder="000" class="form-control">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Icon</label>
                        <div class="col-sm-9">
                            <input type="file" class="dropify" data-height="100" name="cat_icon"/>
                            <span>SVG Format only</span>
                        </div>
                    </div> 

                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cat_img" class=" form-control-label">Category Image</label>
                                <input type="file" id="cat_img" name="cat_img"  class="form-control">
                            </div>

                        </div>
                </div>

                        <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="feature_image" class=" form-control-label">Feature Image</label>
                                    <input type="file" id="feature_image" name="feature_image"  class="form-control">
                                </div>

                            </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="lsb_image" class=" form-control-label">Left Side Banner</label>
                                <input type="file" id="lsb_image" name="lsb_image"  class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-12">
                            <h4 class="header-title mt-0 mb-3">Upload Category Slider Image</h4>
                        </div>
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