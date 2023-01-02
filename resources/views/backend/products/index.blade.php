@extends('layout.app')

@section('content')

<div class="card-body">
    <a class="btn btn-sm btn-primary float-right m-3" href="{{ route('products.create') }}">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#SL</th>
                <th scope="col">name</th>
                <th scope="col">SKU</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>


        <tbody>
            @forelse($product as $p)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{$p->name}}</td>
                <td>{{$p->sku}}</td>
                <td>{{$p->price}}</td>
                <td><img width="50px" src="{{asset('public/'.$p->feature_image)}}" alt=""></td>
                <td class="white-space-nowrap">
                    <a href="{{route('products.show',$p)}}" class="btn btn-success btn rounded">
                        Show
                    </a>
                    {{-- <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                    <i class="bi bi-trash"></i>
                    </a>
                    <form class="btn btn-danger btn-sm" id="form{{$p->id}}" action="{{route('products.destroy',$p)}}" method="post"> delete
                        @csrf
                        @method('delete')

                    </form> --}}

                    <a href="{{route('products.edit',$p)}}" class="btn btn-info btn rounded">
                        Edit
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <th colspan="8" class="text-center">No Pruduct Found</th>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>





@endsection
