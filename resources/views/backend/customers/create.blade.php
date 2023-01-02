@extends('layout.app')
@section('content')

<form action="{{route('customer.store')}}"class="col-lg-8 offset-3" method='post'>

@csrf
@method('post')
    <div class="card">
        <div class="card-header"><strong>Add New Customer</strong>
            
            
        <div class="card-body card-block">
            <div class="form-group">
                <label for="FullName" class=" form-control-label">First Name</label>
                <input type="text" id="first_name" name="first_name"  class="form-control class="form-control @if($errors->has('first_name')) parsley-error @endif" placeholder="First Name">

                @if ($errors->has('first_name'))
                    <ul class="parsley-errors-list filled">
                          <li>{{$errors->first('first_name')}}</li>
                    </ul>

                @endif  
            </div>

            <div class="form-group">
                <label for="FullName" class=" form-control-label">Last Name</label>
                <input type="text" id="last_name" name="last_name"  class="form-control class="form-control @if($errors->has('last_name')) parsley-error @endif" placeholder="Last Name">

                @if ($errors->has('last_name'))
                    <ul class="parsley-errors-list filled">
                          <li>{{$errors->first('last_name')}}</li>
                    </ul>

                @endif  
            </div>


            <div class="form-group">
                <label for="FullName" class=" form-control-label">Email</label>
                <input type="text" id="email" name="email" placeholder="Customer Email" class="form-control class="form-control @if($errors->has('email')) parsley-error @endif">

                @if ($errors->has('email'))
                    <ul class="parsley-errors-list filled">
                          <li>{{$errors->first('email')}}</li>
                    </ul>

                @endif  
            </div>


            <div class="form-group">
                <label for="FullName" class="form-control-label float-left">Mobile Number</label>
                
                    <div class="col-sm-2">
       
                    <select name="contact_ext" id="" class="form-control @if($errors->has('contact_ext')) parsley-error @endif">

                        @forelse($context as $cext)
                        <option value="{{$cext->id}}">{{$cext->ext}}</option>
                        @empty
                        <option value="">No Data</option>
                        @endforelse
                    </select>
                    @if($errors->has('contact_ext'))
                    <ul class="parsley-errors-list filled">
                        <li>{{$errors->first('contact_ext')}}</li>
                    </ul>
                    @endif

                    </div>
               

                    <div class="col-sm-7">
                       
                        <input type="text" id="contact" name="contact" placeholder="XXXXXXXXXX" class="form-control @if($errors->has('contact')) parsley-error @endif">
                        @if($errors->has('contact'))
                        <ul class="parsley-errors-list filled">
                            <li>{{$errors->first('contact')}}</li>
                        </ul>
                        @endif
                    </div>
            </div>


            <div class="form-group">
                <label for="Address" class="form-control-label">Address</label>
                    <textarea class="form-control @if($errors->has('address')) parsley-error @endif" name="address" rows="5" id="example-textarea"></textarea>
                    @if($errors->has('address'))
                    <ul class="parsley-errors-list filled">
                        <li>{{$errors->first('address')}}</li>
                    </ul>
                    @endif
            </div>

                 <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="f_image" class=" form-control-label">Postal Code/ZIP</label>
                                    <input type="text" id="image" name="zip"  class="form-control" placeholder="Zip" >
                                </div>

                            </div>
                    </div>
                 <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="f_image" class="form-control-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-control" onchange="set_state(this.value)">
                                <option value="">Select Country</option>
                               
                                    @forelse($country as $c)
                                    
                                         <option value="{{$c->id}}">{{$c->country}}</option>
                                         @empty
                                         <option value="">No Data</option>    
                                         @endforelse                   
                                </select>
                                </div>

                            </div>
                    </div>
                 <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="f_image" class="form-control-label">State</label>
                                    <select name="state_id" id="state_id" class="form-control" onchange="set_city(this.value)">
                                <option value="">Select State</option>
                                    @forelse($state as $c )
                                         <option class="state st{{$c->country_id}}" value="{{$c->id}}">{{$c->state}}</option>
                                         @empty
                                         <option value="">No data</option>  
                                         @endforelse                     
                                </select>
                                </div>

                            </div>
                    </div>
                 <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="f_image" class="form-control-label">City</label>
                                    <select name="city_id" id="city_id" class="form-control">
                                <option value="">Select City</option>
                                    @forelse($city as $c)
                                         <option class="city ct{{$c->state_id}}" value="{{$c->id}}">{{$c->city}}</option>  
                                         @empty
                                         <option value="">No data</option>
                                         @endforelse                     
                                </select>
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