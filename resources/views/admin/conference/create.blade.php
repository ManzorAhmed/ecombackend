@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Conference Flyer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('conference.index')}}">Conference List</a></li>
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
                            <h3 class="card-title">Create Flyer</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open([ 'route' => 'conference.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}

                        <div class="card-body">
                            <div id="dynamic-fields">
                                <div class="form-group">
                                    <label for="field_headings">Field Heading</label>
                                    <input type="text" name="field_headings[]" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="paragraphs">Paragraph</label>
                                    <textarea name="paragraphs[]" class="form-control" ></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="images">Image</label>
                                    <input type="file" name="images[]" class="form-control" >
                                </div>
                            </div>

                            <button type="button" id="add-field" class="btn btn-primary">Add Field</button>
                        </div>
                        <div class="card-body">
                            <div class="card-footer">
                                <a href="{{ route('conference.index') }}" class="btn btn-info waves-effect waves-light
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
    <!-- Include jQuery library -->
    <!-- Include jQuery library (you can add this in your main layout file) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add new field when the "Add Field" button is clicked
            $('#add-field').click(function() {
                var newField = `
                <div class="form-group">
                    <label for="field_headings">Field Heading</label>
                    <input type="text" name="field_headings[]" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="paragraphs">Paragraph</label>
                    <textarea name="paragraphs[]" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                    <label for="images">Image</label>
                    <input type="file" name="images[]" class="form-control" >
                </div>
            `;

                $('#dynamic-fields').append(newField);
            });

            // Remove field when the "Remove Field" button is clicked
            $(document).on('click', '.remove-field', function() {
                $(this).closest('.form-group').remove();
            });
        });
    </script>


@endsection
