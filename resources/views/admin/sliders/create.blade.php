@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('slider.index')}}">Slider List</a></li>
                        <li class="breadcrumb-item active">Add New</li>
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
                            <h3 class="card-title">Create Slider</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open([ 'route' => 'slider.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('image', null, ['class' => 'form-control','id'=>'image','placeholder'=>'Add Image']) }}
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Slider Heading</label>
                                <input type="text" name="name"
                                       class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       id="name" value="{{ get_static_option('name') }}"
                                       placeholder="Enter Your Service Heading ">
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="paragraph">Slider Paragraph</label>--}}
{{--                                <textarea name="paragraph" id="paragraph"--}}
{{--                                          class="form-control  {{ $errors->has('paragraph') ? 'is-invalid' : '' }}"--}}
{{--                                          placeholder="Enter Your Slider Detail"></textarea>--}}
{{--                                @error('paragraph')--}}
{{--                                <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="paragraph">Slider Button</label>--}}
{{--                                <input type="text" name="button"--}}
{{--                                       class="form-control  {{ $errors->has('button') ? 'is-invalid' : '' }}"--}}
{{--                                       id="button" value="{{ get_static_option('button') }}"--}}
{{--                                       placeholder="Enter Your Button text ">--}}
{{--                                @error('button')--}}
{{--                                <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="paragraph">Button Permalink</label>--}}
{{--                                <input type="text" name="slug"--}}
{{--                                       class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }}"--}}
{{--                                       id="slug" value="{{ get_static_option('slug') }}"--}}
{{--                                       placeholder="Enter Your Slug Here ">--}}
{{--                                @error('slug')--}}
{{--                                <span class="error invalid-feedback">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="card-body">
                            <div class="card-footer">
                                <a href="{{ route('slider.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    {{ Form::close() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // DropzoneJS Demo Code End
    </script>
@endsection
