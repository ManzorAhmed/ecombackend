@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Navbar List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Navbar</li>
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
                    <div class="card">
                        <div class="card-header">
                            {{--                            @if(Auth::user()->role == 'admin')--}}
                            <div class="form-group float-right">
                                @can('user-delete')
                                    <a class="btn btn-danger" onclick="del_selected()" href="javascript:void(0)">
                                        <i class="fa fa-trash"></i> Delete All
                                    </a>
                                    <a class="btn btn-success" href="{{route('navbar.create')}}">
                                        <i class="fa fw fa-plus"></i> Add New
                                    </a>
                                @endcan
                            </div>
                            {{--                            @endif--}}
                            <h4 class="float-left">Navbar List</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ url('admin/delete-selected-pdf') }}" method="post" id="delete-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox checkbox-success m-0">
                                                    <input type="checkbox">
                                                    <label for="checkbox3"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Parent Menu</th>
                                            <th>Parent Link</th>
                                            <th>Active</th>
                                            {{--                                            <th>Quantity</th>--}}
                                            {{--                                            <th>Price</th>--}}
                                            <th>Created At</th>
                                            <th>Action</th>
                                            @if(Auth::user()->role == 'admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($navbars as $navbar)
                                            <tr>
                                                <td></td>
                                                <td>{{ $navbar->id }}</td>
                                                <td>{{ $navbar->name }}</td>
                                                <td>
                                                    <a href="{{ $navbar->link }}" target="_blank" class="btn btn-info btn-sm" title="View Url">View</a>
                                                </td>
                                                <td>
                                                    @if ($navbar->parent)
                                                        {{ $navbar->parent->name }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($navbar->parent)
                                                        <a href="{{ $navbar->parent->link }}" target="_blank" class="btn btn-info btn-sm" title="View Url">{{ $navbar->parent->name }}</a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($navbar->active)
                                                        <span class="btn btn-sm btn-success">Active</span>
                                                    @else
                                                        <span class="btn btn-sm btn-warning">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $navbar->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" onclick="event.preventDefault(); viewInfo({{ $navbar->id }});"
                                                       title="View Log" href="javascript:void(0)">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a title="Edit Menu" class="btn btn-primary btn-circle"
                                                       href="{{route('navbar.edit', $navbar->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault(); del({{ $navbar->id }});"
                                                       title="Delete Order" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>

                            <!-- Modal -->
                            <div id="model" class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Navbar Detail</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Modal body content -->
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card -->
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        function del(id) {
            swal.fire({

                title: "Are you sure!",
                text: "This Menu will be deleted permanently",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                showCancelButton: true,
            })
                .then((result) => {
                    if (result.value) {
                        var APP_URL = {!! json_encode(url('/')) !!}
                            window.location.href = APP_URL + "/admin/navbar/delete/" + id;
                    }
                });
        }

        function del_selected() {
            swal.fire({
                title: "Are you sure?",
                text: "These navbar/navbars will be deleted permanently",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            })
                .then((result) => {
                    if (result.value) {
                        $("#delete-form").submit();
                        setTimeout(function () {
                            swal("Navbar deleted successfully. Thanks");
                        }, 2000);
                    }
                });
        }
    </script>

    <script>
        $(document).on('click', 'th input:checkbox', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });
        });

        function viewInfo(id) {
            var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('admin.getNavbarDetail') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function (response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                // Display Modal
                $('#model').modal('show');
            }).fail(function (xhr, status, error) {
                console.error(xhr.responseText);
            });
        }


        jQuery(function ($) {
            //initiate dataTables plugin
            var myTable =
                $('#datatable').DataTable();
        });


    </script>
@endsection
