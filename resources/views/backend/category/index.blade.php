@extends('layout.app')

@section('content')

<div class="card-body">
    <a class="btn btn-sm btn-primary float-right m-3" href="{{route('category.create')}}">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#SL</th>
                <th scope="col">Category Name</th>
                <th scope="col">For Games?</th>
                <th scope="col">Featured?</th>
                <th scope="col">Show Category Page?</th>
                <th scope="col">Category Page Order</th>
                <th scope="col">Action</th>
            </tr>
        </thead>


        <tbody>

            @forelse($categories as $cat)
            <tr>
                <th scope="row">{{++$loop->index }}</th>
                <td>{{$cat->name}}</td>
                <td>{{$cat->is_game}}</td>
                <td>{{$cat->feature_cat}}</td>
                <td>{{$cat->show_catpage}}</td>
                <td>{{$cat->cat_page_order}}</td>

                <td class="white-space-nowrap">
                    <a href="{{route('category.edit',$cat)}}">
                        <i class="btn btn-primary btn-sm">Edit</i>
                    </a>
                    {{-- <a href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">
                    <i class="btn btn-danger">Delete</i>
                    </a> --}}
                    <form id="form{{$cat->id}}" action="{{route('category.destroy',$cat->id)}}" method="post">
                        @csrf
                        @method('delete')

                    </form>
                </td>
            </tr>
            @empty

            <tr>
                <th colspan="4">No Category Found</th>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
