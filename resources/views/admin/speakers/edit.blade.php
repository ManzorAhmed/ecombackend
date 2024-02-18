@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Speaker</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('speaker.index')}}">Speaker List</a></li>
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
                            <h3 class="card-title">Update Speaker</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($speaker, ['method' => 'PATCH','route' => ['speaker.update', $speaker->id],'class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('image', ['class' => 'form-control', 'id' => 'image', 'placeholder' => 'Add Image']) }}
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div class="clearfix"></div>
                                    @isset($speaker->image)
                                        <div>
                                            <img src="{{ asset('uploads/Faculty/' . $speaker->image) }}"
                                                 style="height: 80px"/>
                                        </div>
                                        <div class="mt-2">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="delete_image" value="1"> Delete Existing
                                                Image
                                            </label>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Speaker Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       id="name" value="{{ $speaker->name }}" placeholder="Enter Your Speaker Name">
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="country">Update Country</label>
                                    <input type="text" name="country" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                           id="country" value="{{ $speaker->country }}" placeholder="Update Your Country Name">
                                    @error('country')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="form-group">
                                <label for="paragraph">Speaker Paragraph</label>
                                <textarea name="paragraph" id="paragraph"
                                          class="form-control {{ $errors->has('paragraph') ? 'is-invalid' : '' }}"
                                          placeholder="Enter Your portfolio Detail">{{ $speaker->paragraph }}</textarea>
                                @error('paragraph')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Faculty Title</label>
                                <select name="title" id="title" class="form-control">
                                    <option value="">Select Title</option>
                                    <option value="International Faculty" {{ $speaker->title == 'International Faculty' ? 'selected' : '' }}>
                                        International Faculty</option>
                                    <option value="Regional & Local Faculty" {{ $speaker->title == 'Regional & Local Faculty' ? 'selected' : '' }}>
                                        Regional & Local Faculty</option>
                                </select>
                                @error('title')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div>
                                    <input type="checkbox" name="active" id="active"
                                           {{ ($speaker->active) ? 'checked' : '' }} data-bootstrap-switch data-off-color="danger"
                                           data-on-color="success">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('speaker.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
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
