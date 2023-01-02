@extends('layout.app')

@section('content')

<div class="card-body">
    <a class="btn btn-sm btn-primary float-right m-3" href="{{ route('customer.create') }}">Add New</a>
    <h4 class="mt-0 header-title mb-3">Customer List</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No</th>
                <th scope="col">Address</th>
                <th scope="col">Country</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>


        <tbody>
      
            @forelse($customers as $customer)
            <tr>
                <th scope="row">{{++$loop->index }}</th>
                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->contact_ext}} - {{$customer->contact}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->countries->country}}</td>
                {{-- <td>{{$customer->zip}},{{$customer->city_id}},<br>{{$customer->cities->city}},{{$customer->state_id}}{{$customer->states->state}},{{$customer->country_id}}<br>{{$customer->country->country}}</td> --}}
                <td>{{$customer->status==1?"Active":"Inactive"}}</td>
               
                 <td>
                                               
                    <a href="{{route('customer.edit',$customer)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                    <!--<button type="button" class="btn btn-danger btn-rounded width-sm waves-effect waves-light">Delete</button>-->
                </td>
                  @empty
                <td colspan="6" class="text-center">
                    there is no data
                </td>
            </tr>
          
              @endforelse

        </tbody>
    </table>
    <!-- <div class="card-box">
        <div class="clearfix">
            {{-- {{$customers->appends($_GET)->links('pagination::boostrap-4')}} --}}
        </div>
    </div> -->
</div>

@endsection