@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Portfolio Image</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('portfolioimage1.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label>Portfolios</label>
                            <select name="portfolio1_id" id="portfolio1_id" class="form-control">
                                @foreach ($portfolio1s as $portfolio1)
                                    <option value="{{ $portfolio1->id }}">{{ $portfolio1->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('portfolio1_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('portfolio1_id') }}
                            </div>
                            @endif
                        </div>
                     </div><br>

                      <div class="row" style="margin-top: 15px">
                        <div class="col-md-6">
                            <label for="image">Image</label>
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
                    </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
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

