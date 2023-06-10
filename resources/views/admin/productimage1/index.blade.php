@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">All Product Image</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

             <a href="{{ route('productimage1.create')}}" class="btn bg-success mb-2">Add Product Image +</a>


        <div class="card">
            <div class="card-body">

                @if(session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>

                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 2%;">#</th>
                            <th>Image</th>
                            <th>Products</th>
                            <th colspan="2" style="width: 2%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productimages1 as $productimage1)
                        <tr>
                            <td>{{ $productimage1->id }}</td>
                            <td>
                                <img src="{{ asset($productimage1->image) }}" alt="" width="35" height="35">
                            </td>
                            <td>{{ $productimage1->product1->title_en ?? "" }}</td>
                            <td>
                                <a href="{{ route('productimage1.edit', $productimage1->id) }}" class="btn btn-primary btn-icon">
                                    <i class="fa fa-edit">Edit</i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('productimage1.destroy', $productimage1->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i class="fa fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $productimages1->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection