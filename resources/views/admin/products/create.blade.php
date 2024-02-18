@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('product.index')}}">Navbar List</a></li>
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
                            <h3 class="card-title">Create Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('product.store') }}" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           id="name"
                                           placeholder="Enter name">
                                    @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Link</label>
                                    <input type="text" name="slug"
                                           class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                           id="slug"
                                           placeholder="Place Your Link Here">
                                    @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="active">Description</label>
                                    <textarea name="description"
                                              class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                              rows="5"
                                              id="description"
                                              placeholder="Place Product Description Here">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span id="description-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categories">Select Category</label>
                                    <select name="category_ids[]" class="select2" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
                                        <option value="0">Select All Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_ids') <!-- Update the name here to match your controller -->
                                    <span id="categories-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="active">Active</label>
                                    <div>
                                        <input type="checkbox" name="active" id="active" checked data-bootstrap-switch
                                               data-off-color="danger" data-on-color="success">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('product.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
@endsection
