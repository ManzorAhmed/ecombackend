@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Registered Member Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('active_abu_dhabi.index')}}">Registered Member
                                List</a>
                        </li>
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
                            <h3 class="card-title">Update User Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('active_abu_dhabi.update', $booking->id) }}"
                              class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div id="dynamic-fields">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                               value="{{ $booking->first_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                               value="{{ $booking->last_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="team_name">Team Name</label>
                                        <input type="text" name="team_name" class="form-control"
                                               value="{{ $booking->team_name }}">
                                    </div>

                                    <div class="participant-fields">
                                        @foreach($booking->participants as $participant)
                                            <div class="form-group">
                                                <label for="participant_name">Participant Name</label>
                                                <input type="text" name="participant_name[]" class="form-control"
                                                       value="{{ $participant->name }}"><br>
                                                <button type="button" class="remove-participant btn btn-danger">Remove
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" id="add-participant" class="btn btn-primary">Add More
                                        Participant (Optional)
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-footer">
                                    <a href="{{ route('active_abu_dhabi.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

        $(document).ready(function () {
            let dynamicFields = $('#dynamic-fields');
            let addButton = $('#add-participant');

            $(addButton).click(function () {
                let participantFields = `
                <div class="form-group">
                    <label for="participant_name">Participant Name</label>
                    <input type="text" name="participant_name[]" class="form-control"><br>
                    <button type="button" class="remove-participant btn btn-danger">Remove</button>
                </div>
            `;
                $(dynamicFields).find('.participant-fields').append(participantFields);
            });

            $(dynamicFields).on('click', '.remove-participant', function () {
                $(this).parent().remove();
            });
        });
    </script>
@endsection
