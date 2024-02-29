@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Payment Gateway</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('payment_gateway.index')}}">Email List</a></li>
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
                            <h3 class="card-title">Create Email</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('payment_gateway.store') }}" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           id="name"
                                           placeholder="Enter Gateway Name">
                                    @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="api_key">API Key</label>
                                    <input type="text" name="api_key"
                                           class="form-control {{ $errors->has('api_key') ? 'is-invalid' : '' }}"
                                           id="api_key"
                                           placeholder="Enter API Key">
                                    @error('api_key')
                                    <span id="api_key-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <input type="text" name="currency"
                                           class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}"
                                           id="currency"
                                           placeholder="Enter Currency">
                                    @error('currency')
                                    <span id="currency-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="min_amount">Min Amount</label>
                                    <input type="number" name="min_amount"
                                           class="form-control {{ $errors->has('min_amount') ? 'is-invalid' : '' }}"
                                           id="min_amount"
                                           placeholder="Enter Min Amount">
                                    @error('min_amount')
                                    <span id="min_amount-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="max_amount">Max Amount</label>
                                    <input type="number" name="max_amount"
                                           class="form-control {{ $errors->has('max_amount') ? 'is-invalid' : '' }}"
                                           id="max_amount"
                                           placeholder="Enter Max Amount">
                                    @error('max_amount')
                                    <span id="max_amount-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('payment_gateway.index') }}" class="btn btn-info waves-effect waves-light
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
@endsection

