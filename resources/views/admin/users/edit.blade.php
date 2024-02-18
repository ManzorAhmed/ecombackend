@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users List</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('users.update', $user->id) }}" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Enter name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                       <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                         </span>
                                        </div>
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Password">
                                    @error('password')
                                    <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="roles">Update Role</label>
                                    <select name="roles[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a Role" style="width: 100%;">
                                        <option value="0">Select All Roles</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <span id="roles-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="permissions">Update Permission</label>
                                    <select name="permissions[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a Permission" style="width: 100%;">
                                        <option value="0">Select All Permissions</option>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}" {{ in_array($permission->id, $userPermissions) ? 'selected' : '' }}>
                                                {{ $permission->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                    <span id="permissions-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="active">Active</label>
                                    <div>
                                        <input type="checkbox" name="active" id="active" {{ old('active', $user->active) ? 'checked' : '' }} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

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
@endsection
