@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>IIWCG Course Brocheur</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage IIWCG</li>
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
                                        <a class="btn btn-success" href="{{route('iiwcc_course.create')}}">
                                            <i class="fa fw fa-plus"></i> Add New
                                        </a>
                                    @endcan
                                </div>
{{--                            @endif--}}
                            <h4 class="float-left">IIWCC COURSE Content</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ url('admin/delete-selected-iiwcc_course') }}" method="post" id="delete-form">
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
{{--                                            <th>Name</th>--}}
                                            <th>Heading</th>
{{--                                            <th>Paragraph</th>--}}
{{--                                            <th>Button</th>--}}
{{--                                            <th>Slug</th>--}}
                                            <th>Created at</th>
                                            <th>Action</th>
                                            @if(Auth::user()->role == 'admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($iiwcc as $r)
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-success m-0">
                                                        <input id="checkbox{{$r->id}}" type="checkbox" name="service[]" value="{{$r->id}}">
                                                        <label for="checkbox{{$r->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$r->id}}
{{--                                                    @if(File::exists('uploads/gallery/'.$r->image))--}}
{{--                                                        <img src="{{asset('uploads/gallery/'.$r->image)}}" width="100" />--}}
{{--                                                    @endif--}}
                                                </td>
                                                @php
                                                    $content = json_decode($r->content, true);
                                                @endphp
                                                <td>{{$content[0]['headings']}}</td>
{{--                                                <td>{{$content[0]['paragraphs']}}</td>--}}
{{--                                                <td>{{$content[0]['button']}}</td>--}}
{{--                                                <td>{{$r->slug}}</td>--}}
                                                <td>{{$r->created_at}}</td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" onclick="event.preventDefault(); viewInfo({{ $r->id }});"
                                                       title="View Log" href="javascript:void(0)">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a title="Edit Course" class="btn btn-primary btn-circle" href="{{route('iiwcc_course.edit', $r->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-circle" onclick="event.preventDefault();del({{$r->id}});" title="Delete Broucher" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i>
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
                                            <h4 class="modal-title">IIWCG Course Detail</h4>
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
                text: "This Course will be deleted permanently",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                showCancelButton: true,
            })
                .then((result) => {
                    if (result.value) {
                        var APP_URL = {!! json_encode(url('/')) !!}
                            window.location.href = APP_URL + "/admin/iiwcc_course/delete/" + id;
                    }
                });
        }

        function del_selected() {
            swal.fire({
                title: "Are you sure?",
                text: "These Course/courses will be deleted permanently",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            })
                .then((result) => {
                    if (result.value) {
                        $("#delete-form").submit();
                        setTimeout(function () {
                            swal("Course deleted successfully. Thanks");
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
            $.post("{{ route('admin.getIiwcc_courseDetail') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function (response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                // Display Modal
                $('#model').modal('show');
            }).fail(function (error) {
                console.error(error);
            });
        }

        jQuery(function ($) {
            // Initiate dataTables plugin
            var myTable = $('#datatable').DataTable();
        });
    </script>

@endsection
