@extends('layout.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
       <h4 class="page-title text-center">Product Show</h4>
    </div>
  </div> 

  <div class="row">
    <div class="col-sm-6 offset-3">
      @if($product)
         <div class="bg-picture card-box">
                    <div class="profile-info-name">
                        {{-- <img src="{{asset('uploads/'.$p->feature_image)}}" class="rounded-circle avatar-xl img-thumbnail float-left mr-3" alt="profile-image"> --}}

                        <div class="profile-info-detail overflow-hidden text-center bg-white p-5 mt-3 mb-3">
                            <h4 class="m-0"><span class="font-weight-bold">Product Name</span>: <p>{{$product->name}}</p></h4>
                            <p class="text-muted"><i><span class="font-weight-bold">Sku</span> :{{$product->sku}}</i></p>
                            <p class="font-13"><span class="font-weight-bold">Manufacturer</span> :{{$product->manufacturer_id}}</p>
                            <p class="font-13"><span class="font-weight-bold">Category</span> :{{$product->category->name}}</p>
                            <p class="font-13"><span class="font-weight-bold">Sub Category</span> :{{$product->subcategory->name?$product->subcategory->name:""}}</p>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

              <div class="text-center bg-white p-5 mb-3 ">
                    <div class="card-box">
                    <p class="text-muted"><i><span class="font-weight-bold">Product Title</span> :{{$product->product_title}}</i></p>
                    <p class="font-13 font-weight-bold">Short Description :</p>
                    <p class="font-13 ">{!!$product->short_description!!}</p>
                </div>
                <div class="card-box">
                    <p class="font-13 font-weight-bold">Long Description :</p>
                    <p class="font-13 ">{!!$product->long_description!!}</p>
                </div>
                <div class="card-box">
                    <p class="font-13 font-weight-bold mt-3">Specification</p>
                    <p class="font-13 ">{!!$product->specification!!}</p>
                </div>
              </div>

    </div>
    <div class="col-sm-6 offset-3 mb-5">
        <div class="card-box text-center">
                    <h4 class="header-title mt-0 mb-3 text-center">Pricing Info</h4>
                    <ul class="list-group mb-0 user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-2.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1 font-weight-bold">Price</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->price}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-3.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1 font-weight-bold">Discount</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->discount}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-5.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1 font-weight-bold">Max Quantity</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->max_qty}}</p>
                                </div>
                            </a>
                        </li>

                       

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1 font-weight-bold">Warranty</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->warranty}}</p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1 font-weight-bold">Product Condition</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->product_condition}}</p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1 font-weight-bold">VAT</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->vat_status}}</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
@php
$status = array("","YES","NO");    
@endphp
    </div>
     @endif
  </div>
</div>



@endsection