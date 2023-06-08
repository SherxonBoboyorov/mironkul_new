@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Portfolio Image</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('portfoliometalimage.update', $portfoliometalimage->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="portfoliometal_id">Portfolios</label>
                            <select name="portfoliometal_id" id="portfoliometal_id" class="form-control">
                                @foreach ($portfoliometal as $portfoliometal)
                                <option @if($portfoliometal->id == $portfoliometalimage->portfoliometal_id) selected @endif value="{{ $portfoliometal->id }}">{{ $portfoliometal->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('portfoliometal_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('portfoliometal_id') }}
                            </div>
                            @endif
                        </div>
                    </div><br>
                      
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-6">
                            <label for="image">File</label>
                            <input type="file" name="image" class="form-control-file">
                            @if($errors->has('image'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($portfoliometalimage->image) }}" width="150" height="150" alt="">
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

