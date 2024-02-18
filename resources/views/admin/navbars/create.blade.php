@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Navbar Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('pdf.index')}}">Navbar List</a></li>
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
                            <h3 class="card-title">Create Menu</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open([ 'route' => 'navbar.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                       class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                       placeholder="Enter name">
                                @error('name')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text"name="link"
                                       class="form-control  {{ $errors->has('link') ? 'is-invalid' : '' }}" id="link"
                                       placeholder="Place Your Link Here">
                                @error('name')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class ="card-body">
                            <div class="form-group">
                                <label for="parent_id">Parent Menu</label>
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option value="">No Parent</option>
                                    @foreach($navbars as $navbar)
                                        <option value="{{ $navbar->id }}">{{ $navbar->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="parent_url">Parent Menu Link</label>
                                <input type="text" name="parent_url" class="form-control {{ $errors->has('parent_url') ? 'is-invalid' : '' }}"
                                       id="parent_url" placeholder="Place Your Link Here" value="{{ old('parent_url') }}">
                                @error('parent_url')
                                <span id="parent_url-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div>
                                    <input type="checkbox" name="active" id="active" checked data-bootstrap-switch
                                           data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-footer">
                                <a href="{{ route('navbar.index') }}" class="btn btn-info waves-effect waves-light
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
        <!-- /.row -->

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
