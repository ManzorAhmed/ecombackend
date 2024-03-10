@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blog List</a></li>
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
                            <h3 class="card-title">Create Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('blog.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                           class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                           id="title"
                                           placeholder="Enter title">
                                    @error('title')
                                    <span id="title-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div id="paragraphs">
                                    <div class="paragraph">
                                        <div class="form-group">
                                            <label for="heading_0">Paragraph Heading</label>
                                            <input type="text" name="paragraphs[0][heading]"
                                                   class="form-control"
                                                   id="heading_0"
                                                   placeholder="Enter heading">
                                        </div>
                                        <div class="form-group">
                                            <label for="content_0">Paragraph Content</label>
                                            <textarea name="paragraphs[0][content]" class="form-control"
                                                      id="content_0" placeholder="Enter content"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="addParagraph" class="btn btn-primary">Add Paragraph</button>

                                <div class="form-group mt-3">
                                    <label for="images">Images</label>
                                    <input type="file" name="images[]" class="form-control-file" id="images" multiple>
                                </div>
                            </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('blog.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>


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
        document.getElementById('addParagraph').addEventListener('click', function() {
            const paragraphs = document.getElementById('paragraphs');
            const paragraphCount = paragraphs.getElementsByClassName('paragraph').length;
            const newParagraph = document.createElement('div');
            newParagraph.classList.add('paragraph');
            newParagraph.innerHTML = `
            <div class="form-group">
                <label for="heading_${paragraphCount}">Paragraph Heading</label>
                <input type="text" name="paragraphs[${paragraphCount}][heading]"
                       class="form-control"
                       id="heading_${paragraphCount}"
                       placeholder="Enter heading">
            </div>
            <div class="form-group">
                <label for="content_${paragraphCount}">Paragraph Content</label>
                <textarea name="paragraphs[${paragraphCount}][content]" class="form-control"
                          id="content_${paragraphCount}" placeholder="Enter content"></textarea>
            </div>
        `;
            paragraphs.appendChild(newParagraph);
        });
    </script>
@endsection
@endsection
