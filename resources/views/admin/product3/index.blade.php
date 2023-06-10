@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">All Products</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

             <a href="{{ route('product3.create')}}" class="btn bg-success mb-2">Add Products +</a>


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
                            <th>Title [Uzbek]</th>
                            <th>Title [Russian]</th>
                            <th>Title [English]</th>
                            <th colspan="2" style="width: 2%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products3 as $product3)
                        <tr>
                            <td>{{ $product3->id }}</td>
                            <td>
                                <img src="{{ asset($product3->image) }}" alt="" width="35" height="35">
                            </td>
                            <td>{{ $product3->title_uz }}</td>
                            <td>{{ $product3->title_ru }}</td>
                            <td>{{ $product3->title_en }}</td>
                            <td>
                                <a href="{{ route('product3.edit', $product3->id) }}" class="btn btn-primary btn-icon">
                                    <i class="fa fa-edit">Edit</i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('product3.destroy', $product3->id) }}" method="POST">
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
                {!! $products3->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
