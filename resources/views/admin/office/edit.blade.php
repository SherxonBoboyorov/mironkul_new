@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Office</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('office.update', $office->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label for="title_uz">Title [Uzbek]</label>
                            <input type="text" id="title_uz" value="{{ $office->title_uz }}" class="form-control" name="title_uz">
                            @if($errors->has('title_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_uz') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="title_ru">Title [Russian]</label>
                            <input type="text" id="title_ru" value="{{ $office->title_ru }}" class="form-control" name="title_ru">
                            @if($errors->has('title_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_ru') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="title_en">Title [English]</label>
                            <input type="text" id="title_en" value="{{ $office->title_en }}" class="form-control" name="title_en">
                            @if($errors->has('title_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_en') }}
                            </div>
                            @endif
                        </div>
                      </div><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="number">Phone number:</label>
                                <input type="text" id="number" value="{{ $office->number }}" class="form-control" name="number">
                                @if($errors->has('number'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('number') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                        
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="gmail">Email:</label>
                                <input type="text" id="gmail" value="{{ $office->gmail }}" class="form-control" name="gmail">
                                @if($errors->has('gmail'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('gmail') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-8">
                                <label for="addres_uz">Address [Uzbek]</label>
                                <input type="text" id="addres_uz" value="{{ $office->addres_uz }}" class="form-control" name="addres_uz">
                                @if($errors->has('addres_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('addres_uz') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-8">
                                <label for="addres_ru">Address [Russian]</label>
                                <input type="text" id="addres_ru" value="{{ $office->addres_ru }}" class="form-control" name="addres_ru">
                                @if($errors->has('addres_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('addres_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-8">
                                <label for="addres_en">Address [English]</label>
                                <input type="text" id="addres_en" value="{{ $office->addres_en }}" class="form-control" name="addres_en">
                                @if($errors->has('addres_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('addres_en') }}
                                </div>
                                @endif
                            </div>
                          </div><br>


                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="second_number">Second Phone number:</label>
                                <input type="text" id="second_number" value="{{ $office->second_number }}" class="form-control" name="second_number">
                                @if($errors->has('second_number'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('second_number') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                        
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="second_gmail">Second Email:</label>
                                <input type="text" id="second_gmail" value="{{ $office->second_gmail }}" class="form-control" name="second_gmail">
                                @if($errors->has('second_gmail'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('second_gmail') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="map">Map</label>
                                <input type="text" id="map" value="{{ $office->map }}" class="form-control" name="map">
                                @if($errors->has('map'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('map') }}
                                </div>
                                @endif
                            </div>
                        </div>

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

