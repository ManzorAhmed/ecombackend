@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Email Tempate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('email.index')}}">Users List</a></li>
                        <li class="breadcrumb-item active">Edit Email</li>
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
                            <h3 class="card-title">Edit Email</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('email.update', $template->id) }}" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                           class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                           id="title" placeholder="Enter name"
                                           value="{{ old('title', $template->title) }}">
                                    @error('title')
                                    <span id="title-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Template Key</label>
                                    <input type="text" name="template_key"
                                           class="form-control {{ $errors->has('template_key') ? 'is-invalid' : '' }}"
                                           id="template_key" placeholder="Enter Template Key"
                                           value="{{ old('template_key', $template->template_key) }}">
                                    @error('template_key')
                                    <span id="template_key-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject"
                                           class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                           id="subject" placeholder="Enter subject"
                                           value="{{ old('subject', $template->subject) }}">
                                    @error('subject')
                                    <span id="subject-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="to">Recipient Email(s)</label>
                                    <input type="text" name="recipient_emails"
                                           class="form-control {{ $errors->has('recipient_emails') ? 'is-invalid' : '' }}"
                                           id="recipient_emails" placeholder="Update Recipient Email"
                                           value="{{ old('recipient_emails', implode(',', $recipientEmails)) }}">
                                    @error('recipient_emails')
                                    <span id="recipient_emails-error"
                                          class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <input type="email" name="to"
                                           class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}"
                                           id="to" placeholder="Update recipient email" value="{{ old('to', $template->to) }}">
                                    @error('to')
                                    <span id="to-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email_content">Email Content</label>
                                    <textarea name="email_content" id="email_content"
                                              class="form-control {{ $errors->has('email_content') ? 'is-invalid' : '' }}"
                                              placeholder="Enter email content">{{ old('email_content', $template->email_content) }}</textarea>
                                    @error('email_content')
                                    <span id="email_content-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email_content">Email Content</label>
                                    <textarea name="email_content" id="email_content"
                                              class="form-control ckeditor {{ $errors->has('email_content') ? 'is-invalid' : '' }}"
                                              placeholder="Enter email content">{{ old('email_content', $template->email_content) }}</textarea>
                                    @error('email_content')
                                    <span id="email_content-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contents">Contents</label>
                                    <textarea name="text" class="summernote" id="contents" title="Contents"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="admin_email">Admin Email</label>
                                    <input type="email" name="admin_email" class="form-control {{ $errors->has('admin_email') ? 'is-invalid' : '' }}" id="admin_email" placeholder="Enter admin email" value="{{ old('admin_email') }}">
                                    @error('admin_email')
                                    <span id="admin_email-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="active">Active</label>
                                    <div>
                                        <input type="checkbox" name="active" id="active"
                                               {{ old('active', $template->active) ? 'checked' : '' }} data-bootstrap-switch
                                               data-off-color="danger" data-on-color="success">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
            $('.select2').select2();

            $('.select2').on('select2:select', function (e) {
                var data = e.params.data;
                if (data.id == 0) {
                    var options = $(this).children('option');
                    options.prop('selected', true);
                    $(this).trigger('change');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                tabsize: 2,
                codemirror: {
                    mode: 'text/html',
                    htmlMode: true,
                    lineNumbers: true,
                    theme: 'monokai'
                }
            });
        });
    </script>

@endsection
