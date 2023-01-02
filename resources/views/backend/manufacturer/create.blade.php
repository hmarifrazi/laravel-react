@extends('layout.app')
@section('content')

<form action="{{route('manufacturer.store')}}"class="col-lg-8 offset-3" method='post'enctype="multipart/form-data">

@csrf
    <div class="card">
        <div class="card-header"><strong>Add New Manufacturer</strong>
            
            
        <div class="card-body card-block">
            <div class="form-group">
                <label for="FullName" class=" form-control-label">Name</label>
                <input type="text" id="name" name="name" placeholder="Manufacturer Name" class="form-control class="form-control @if($errors->has('name')) parsley-error @endif">

                @if ($errors->has('name'))
                    <ul class="parsley-errors-list filled">
                          <li>{{$errors->first('name')}}</li>
                    </ul>

                @endif  
            </div>

            <div class="form-group">
                <label for="FullName" class=" form-control-label">Email</label>
                <input type="text" id="email" name="email" placeholder="Manufacturer Email" class="form-control class="form-control @if($errors->has('email')) parsley-error @endif">

                @if ($errors->has('email'))
                    <ul class="parsley-errors-list filled">
                          <li>{{$errors->first('email')}}</li>
                    </ul>

                @endif  
            </div>



            <div class="form-group">
                <label for="FullName" class=" form-control-label">Contact</label>
                <input type="text" id="contact" name="contact" placeholder="Manufacturer Contact" class="form-control class="form-control @if($errors->has('contact')) parsley-error @endif">

                @if ($errors->has('contact'))
                    <ul class="parsley-errors-list filled">
                          <li>{{$errors->first('contact')}}</li>
                    </ul>

                @endif  
            </div>


            <div class="form-group">
                <label for="Address" class=" form-control-label">Address</label>
                    <textarea class="form-control @if($errors->has('address')) parsley-error @endif" name="address" rows="5" id="example-textarea">Write your address</textarea>
            </div>

                 <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="f_image" class=" form-control-label">Upload Image</label>
                                    <input type="file" id="image" name="image"  class="form-control" data-height="300" class="dropify">
                                </div>

                            </div>
                    </div>
                <div class="form-group mb-0">
                            <div class="col-2 mr-3">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>

        </div>
    </div>
</form>
 @endsection