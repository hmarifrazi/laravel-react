@extends('layout.app')

@section('content')

<div class="card-body">
    <a class="btn btn-sm btn-primary float-right m-3" href="{{ route('manufacturer.create') }}">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#SL</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>


        <tbody>

            @forelse($manufacturers as $manufacturer)
            <tr>
                <th scope="row">{{++$loop->index }}</th>
                <td>{{$manufacturer->name}}</td>
                <td>{{$manufacturer->email}}</td>
                <td>{{$manufacturer->contact}}</td>
                <td>{{$manufacturer->address}}</td>
                <td><img src="{{asset($manufacturer->image)}}" width="60" height="60" alt=""></td>
                <td>

                    <a href="{{route('manufacturer.edit',$manufacturer)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>

                </td>
                @empty
                <td colspan="6" class="text-center">
                    there is no data
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>
</div>

@endsection
