@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Product Video</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('productvideo.update', $productvideo->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="product_id">Products</label>
                            <select name="product_id" id="product_id" class="form-control">
                                @foreach ($product as $product)
                                <option @if($product->id == $productvideo->product_id) selected @endif value="{{ $product->id }}">{{ $product->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('product_id') }}
                            </div>
                            @endif
                        </div>
                    </div><br>
                      
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-6">
                            <label for="video">File</label>
                            <input type="file" name="video" class="form-control-file">
                            @if($errors->has('video'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('video') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <video src="{{ asset($productvideo->video) }}" width="150" height="150" alt="">
                        </div>
                    </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div><!-- container -->

</div>
@endsection
@section('custom_js')
@component('admin.utils.tinymce')@endcomponent
@endsection
