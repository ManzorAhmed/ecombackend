@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Payment Gateway </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('gateway.index')}}">Slider List</a></li>
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
                            <h3 class="card-title">Create Gateway Manual</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="{{ route('gateway.store') }}" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Gateway Method</label><span class="text-danger">*</span>
                                            <input type="text" name="name"
                                                   class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                   id="name" value="{{ get_static_option('name') }}"
                                                   placeholder="Gateway Method Name  ">
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="currency">Currency</label><span class="text-danger">*</span>
                                            <input type="text" name="currency"
                                                   class="form-control  {{ $errors->has('currency') ? 'is-invalid' : '' }}"
                                                   id="currency" value="{{ old('currency') }}"
                                                   placeholder="Currency  ">
                                            @error('currency')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="rate">Rate</label><span class="text-danger">*</span>
                                    <input type="number" name="rate"
                                           class="form-control  {{ $errors->has('rate') ? 'is-invalid' : '' }}"
                                           id="rate" value="{{ old('min_limit') }}"
                                           placeholder="0">
                                    @error('rate')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="min_limit">Minimum Limit</label><span
                                                class="text-danger">*</span>
                                            <input type="number" name="min_limit"
                                                   class="form-control  {{ $errors->has('min_limit') ? 'is-invalid' : '' }}"
                                                   id="min_limit" value="{{ old('min_limit') }}"
                                                   placeholder="0">
                                            @error('Minimum Limit')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="max_limit">Maximum Limit</label><span
                                                class="text-danger">*</span>
                                            <input type="number" name="max_limit"
                                                   class="form-control  {{ $errors->has('max_limit') ? 'is-invalid' : '' }}"
                                                   id="max_limit" value="{{ old('max_limit') }}"
                                                   placeholder="0">
                                            @error('max_limit')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fixed_charge">Charge</label><span class="text-danger">*</span>
                                            <input type="number" name="fixed_charge"
                                                   class="form-control  {{ $errors->has('fixed_charge') ? 'is-invalid' : '' }}"
                                                   id="fixed_charge" value="{{ old('fixed_charge') }}"
                                                   placeholder="0">
                                            @error('fixed_charge')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="percent_charge">Percent Charge</label><span class="text-danger">*</span>
                                            <input type="number" name="percent_charge"
                                                   class="form-control  {{ $errors->has('percent_charge') ? 'is-invalid' : '' }}"
                                                   id="percent_charge" value="{{ old('percent_charge') }}"
                                                   placeholder="%">
                                            @error('percent_charge')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card border--primary mt-3">

                                        <h5 class="card-header bg--primary">@lang('Deposit Instruction')</h5>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <textarea rows="8" class="form-control border-radius-5 nicEdit"
                                                          name="instruction">{{ old('instruction') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card border--primary mt-3">
                                        <h5 class="card-header bg--primary text-red">@lang('User data')
                                            <button type="button"
                                                    class="btn btn-danger float-right addUserData"><i
                                                    class="la la-fw la-plus"></i>@lang('Add New')
                                            </button>
                                        </h5>
                                        <div class="card-body">
                                            <div class="row addedField">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-footer">
                                    <a href="{{ route('gateway.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    </form>
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
    <script>

        (function ($) {
            "use strict";
            $('input[name=currency]').on('input', function () {
                $('.currency_symbol').text($(this).val());
            });
            $('.addUserData').on('click', function () {
                var html = `
                    <div class="col-md-12 user-data">
                        <div class="form-group">
                            <div class="input-group mb-md-0 mb-4">
                                <div class="col-md-4">
                                    <input name="field_name[]" class="form-control" type="text" required placeholder="@lang('Field Name')">
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <select name="type[]" class="form-control">
                                        <option value="text" > @lang('Input Text') </option>
                                        <option value="textarea" > @lang('Textarea') </option>
                                        <option value="file"> @lang('File') </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <select name="validation[]"
                                            class="form-control">
                                        <option value="required"> @lang('Required') </option>
                                        <option value="nullable">  @lang('Optional') </option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-md-0 mt-2 text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn--danger btn-lg removeBtn w-100" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                $('.addedField').append(html)
            });

            $(document).on('click', '.removeBtn', function () {
                $(this).closest('.user-data').remove();
            });

            @if(old('currency'))
            $('input[name=currency]').trigger('input');
            @endif

        })(jQuery);
    </script>
@endsection

