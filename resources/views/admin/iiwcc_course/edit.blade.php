@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update IIWCC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('iiwcc_course.index')}}">IIWCC COURSE List</a></li>
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
                            <h3 class="card-title">Update IIWCC</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($iiwcc, ['method' => 'PATCH','route' => ['iiwcc_course.update', $iiwcc->id],'class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('image', null, ['class' => 'form-control','id'=>'image','placeholder'=>'Add Image']) }}
                                    @if(File::exists('uploads/gallery/'.$iiwcc->image))
                                        <img src="{{asset('uploads/gallery/'.$iiwcc->image)}}" width="100" />
                                    @endif
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @foreach($iiwcc->headings as $index => $heading)
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="headings">IIWCC Heading {{ $index + 1 }}</label>
                                    <input type="text" name="headings[]" class="form-control {{ $errors->has('headings.'.$index) ? 'is-invalid' : '' }}"
                                           id="headings" value="{{ old('headings.'.$index, $heading) }}" placeholder="Enter Your Heading">
                                    @error('headings.'.$index)
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        @foreach($iiwcc->paragraphs as $index => $paragraph)
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="paragraphs">IIWCC Paragraph {{ $index + 1 }}</label>
                                    <textarea name="paragraphs[]" class="form-control {{ $errors->has('paragraphs.'.$index) ? 'is-invalid' : '' }}"
                                              id="paragraph" placeholder="Enter Your Detail">{{ old('paragraphs.'.$index, $paragraph) }}</textarea>
                                    @error('paragraphs.'.$index)
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                        @if(is_array($iiwcc->buttons) && count($iiwcc->buttons) > 0)
                            @foreach($iiwcc->buttons as $index => $button)
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="button">IIWCC Button {{ $index + 1 }}</label>
                                        <input type="text" name="buttons[]" class="form-control {{ $errors->has('buttons.'.$index) ? 'is-invalid' : '' }}"
                                               id="button" value="{{ old('buttons.'.$index, $button) }}" placeholder="Update Your Button text">
                                        @error('buttons.'.$index)
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        @endif


                        <div class="card-body">
                            <div class="form-group">
                                <label for="paragraph"> Button</label>
                                <input type="text" name="button"
                                       class="form-control  {{ $errors->has('button') ? 'is-invalid' : '' }}"
                                       id="button" value="{{ old('button', $iiwcc->button) }}"
                                       placeholder="Update Your Button text ">
                                @error('button')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="paragraph">IIWCC Permalink</label>
                                <input type="text" name="slug"
                                       class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                       id="slug" value="{{ old('slug', $iiwcc->slug) }}"
                                       placeholder="Enter Your Slug Here ">
                                @error('slug')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- Add button to dynamically add more fields -->
                                <button type="button" class="btn btn-primary" id="add-field-btn">Add More Fields
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('iiwcc_course.index') }}" class="btn btn-info waves-effect waves-light
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
