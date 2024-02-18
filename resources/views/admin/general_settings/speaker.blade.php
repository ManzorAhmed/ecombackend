@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('backend/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/media-uploader.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Slider Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('admin.partials._msg')

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Speaker Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.general.speaker') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="speaker_heading_one">Speaker Heading One</label>
                                    <input type="text" name="slider_heading_one"
                                           class="form-control  {{ $errors->has('speaker_heading_one') ? 'is-invalid' : '' }}"
                                           id="speaker_heading_one" value="{{ get_static_option('speaker_heading_one') }}"
                                           placeholder="Enter Speaker Name">
                                    @error('speaker_heading_one')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="speaker_heading_two">Speaker Description</label>
                                    <input type="text" name="speaker_heading_two"
                                           class="form-control  {{ $errors->has('speaker_heading_two') ? 'is-invalid' : '' }}"
                                           id="speaker_heading_two" value="{{ get_static_option('speaker_heading_two') }}"
                                           placeholder="Enter Speaker Bio">
                                    @error('speaker_heading_two')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="speaker_btn_txt">Slider Button Text</label>
                                    <input type="text" name="slider_btn_txt"
                                           class="form-control  {{ $errors->has('speaker_btn_txt') ? 'is-invalid' : '' }}"
                                           id="slider_btn_txt" value="{{ get_static_option('speaker_btn_txt') }}"
                                           placeholder="Enter Speaker Button Text ">
                                    @error('speaker_btn_txt')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_white_logo"><strong>{{__('Slider Background Image')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $slider_img = get_attachment_image_by_id(get_static_option('slider_background_image'), null, true);
                                                $slider_image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($slider_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="{{ $slider_img['img_url'] }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $slider_image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="slider_background_image" name="slider_background_image"
                                               value="{{ get_static_option('slider_background_image') }}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="Select Site Logo Image" data-modaltitle="Upload Slider Background Image"
                                                data-toggle="modal" data-target="#media_upload_modal">
                                            {{ __($slider_image_btn_label) }}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update SMTP Settings</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @include('admin.partials.media-upload.media-upload-markup')
@endsection
@section('scripts')
    <!-- dropzonejs -->
    @include('admin.partials.media-upload.media-js')
    <script>
        $(function() {
            bsCustomFileInput.init();

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // DropzoneJS Demo Code End
    </script>
@endsection

