@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Portfolio Video</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('portfoliovideo.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label>Portfolios</label>
                                <select name="portfolio_id" id="portfolio_id" class="form-control">
                                    @foreach ($portfolios as $portfolio)
                                        <option value="{{ $portfolio->id }}">{{ $portfolio->title_en }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('portfolio_id'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('portfolio_id') }}
                                </div>
                                @endif
                            </div>
                         </div><br>

                         <div class="row" style="margin-top: 15px">
                            <div class="col-md-6">
                                <label for="video">Video upload</label>
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
                        </div><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
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
