@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agenda Detail List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Agenda</li>
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

                                        <a class="btn btn-danger" onclick="del_selected()" href="javascript:void(0)">
                                            <i class="fa fa-trash"></i> Delete All
                                        </a>
                                        <a class="btn btn-success" href="{{route('agenda.create')}}">
                                            <i class="fa fw fa-plus"></i> Add New
                                        </a>

                                </div>
{{--                            @endif--}}
                            <h4 class="float-left">Agenda Detail List</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ url('admin/delete-selected-agenda') }}" method="post" id="delete-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox checkbox-success m-0">
                                                    <input type="checkbox">
                                                    <label for="checkbox3"></label>
                                                </div>
                                            <th>ID</th>
{{--                                            <th>Banner</th>--}}
                                            <th>Hall Name</th>
                                            <th>Session No</th>
                                            <th>S.E.Time</th>
                                            <th>Date</th>
                                            <th>Speaker</th>
{{--                                            <th>Topic</th>--}}
                                            <th>Active</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                            @if(Auth::user()->role == 'admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($agenda as $r)
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-success m-0">
                                                        <input id="checkbox{{$r->id}}" type="checkbox" name="service[]"
                                                               value="{{$r->id}}">
                                                        <label for="checkbox{{$r->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{$r->id}}</td>
                                                <td>{{$r->hall}}</td>
                                                <td>{{$r->session}}</td>
                                                <td>{{$r->start_time}}</td>
                                                <td>{{$r->event_date}}</td>
                                                <td>{{$r->chair_speaker}}</td>
{{--                                                <td>{{$r->topic}}</td>--}}
                                                <td>
                                                    @if($r->active)
                                                        <span class="btn btn-sm btn-success">Active</span>
                                                    @else
                                                        <span class="btn btn-sm btn-warning">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{$r->created_at}}</td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" onclick="event.preventDefault(); viewInfo({{ $r->id }});"
                                                       title="View Agenda" href="javascript:void(0)">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a title="Edit Agenda" class="btn btn-primary btn-circle"
                                                       href="{{route('agenda.edit', $r->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del({{$r->id}});" title="Delete Slider" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <!-- Add a Duplicate button -->
                                                    <a class="btn btn-secondary btn-circle" onclick="event.preventDefault();duplicateRow({{$r->id}});" title="Duplicate Agenda" href="javascript:void(0)">
                                                        <i class="fa fa-clone"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <!-- /.modal -->
                            <div id="model" class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Agenda Detail</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close
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
                text: "This Agenda will be deleted permanently",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                showCancelButton: true,
            })
                .then((result) => {
                    if (result.value) {
                        var APP_URL = {!! json_encode(url('/')) !!}
                            window.location.href = APP_URL + "/admin/agenda/delete/" + id;
                    }
                });
        }

        function del_selected() {
            swal.fire({
                title: "Are you sure?",
                text: "These agenda/agendas will be deleted permanently",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            })
                .then((result) => {
                    if (result.value) {
                        $("#delete-form").submit();
                        setTimeout(function () {
                            swal("Agenda deleted successfully. Thanks");
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
            $.post("{{ route('admin.getAgendaDetail') }}", {
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
    <script>
        function duplicateRow(rowId) {
            // Send an AJAX request to duplicate the row
            $.ajax({
                type: 'POST',
                url: '/agenda.duplicateRow', // Replace this with the URL to your server-side duplicate route
                data: {
                    _token: '{{ csrf_token() }}',
                    row_id: rowId
                },
                success: function (response) {
                    if (response.success) {
                        // If the duplication was successful, you can reload the page or update the table using JavaScript
                        // For example, you can use location.reload() to reload the page
                        location.reload();
                    } else {
                        // Handle the case when duplication fails (e.g., show an error message)
                        alert('Failed to duplicate the row.');
                    }
                },
                error: function () {
                    // Handle AJAX errors
                    alert('An error occurred during the duplication process.');
                }
            });
        }
    </script>

@endsection
