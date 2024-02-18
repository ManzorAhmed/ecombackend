@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add IIWCC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('iiwcc_course.index')}}">IIWCC List</a></li>
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
                            <h3 class="card-title">Create IIWCC</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open([ 'route' => 'iiwcc_course.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('images[]', ['class' => 'form-control', 'placeholder' => 'Add Image']) }}
                                    <span class="text-danger">{{ $errors->first('images.*') }}</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="headings">IIWCC Heading</label>
                                <input type="text" name="headings[]" class="form-control" id="headings"
                                       placeholder="Enter Your Course Heading">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="paragraphs">IIWCC Paragraph</label>
                                <textarea name="paragraphs[]" class="form-control" id="paragraphs"
                                          placeholder="Enter Your Paragraph Detail"></textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="paragraph">IIWCC Button</label>
                                <input type="text" name="buttons[]" class="form-control" id="button"
                                       placeholder="Enter Your Button text">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="paragraph">Button Permalink</label>
                                <input type="text" name="slug" class="form-control" id="slug"
                                       placeholder="Enter Your Slug Here">
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Add button to dynamically add more fields -->
                            <button type="button" class="btn btn-primary" id="add-field-btn">Add More Fields</button>
                        </div>
                        <div class="card-body">
                            <div class="card-footer">
                                <a href="{{ route('iiwcc_course.index') }}" class="btn btn-info waves-effect waves-light
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Add more fields
            $('#add-field-btn').click(function () {
                var fieldHtml = `
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">IIWCC Heading</label>
                        <input type="text" name="headings[]" class="form-control" placeholder="Enter Your Course Heading">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="paragraph">IIWCC Paragraph</label>
                        <textarea name="paragraphs[]" class="form-control" placeholder="Enter Your Paragraph Detail"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="paragraph">IIWCC Paragraph</label>
                        <textarea name="paragraphs[]" class="form-control" placeholder="Enter Your Paragraph Detail"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="paragraph">IIWCC Paragraph</label>
                        <textarea name="paragraphs[]" class="form-control" placeholder="Enter Your Paragraph Detail"></textarea>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="paragraph">IIWCC Button</label>
                        <input type="text" name="buttons[]" class="form-control" placeholder="Enter Your Button text">
                    </div>
                </div>
            `;

                $(fieldHtml).insertBefore('#add-field-btn');
            });
        });
    </script>

@endsection
