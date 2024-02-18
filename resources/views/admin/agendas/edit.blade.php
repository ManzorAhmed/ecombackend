@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Agenda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('agenda.index')}}">Agenda List</a></li>
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
                            <h3 class="card-title">Update Agenda</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($agenda, ['method' => 'PATCH','route' => ['agenda.update', $agenda->id],'class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('image', null, ['class' => 'form-control','id'=>'image','placeholder'=>'Add Image']) }}
                                    @if(File::exists('uploads/gallery/'.$agenda->image))
                                        <img src="{{asset('uploads/gallery/'.$agenda->image)}}" width="100"/>
                                    @endif
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hall">Conference Hall Name</label>
                                        <input type="text" name="hall"
                                               class="form-control  {{ $errors->has('hall') ? 'is-invalid' : '' }}"
                                               id="hall" value="{{ old('hall', $agenda->hall) }}"
                                               placeholder="Update Your Hall Name Here ">
                                        @error('hall')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hall_color">Edit Hall/Room Color</label>
                                        <input type="color" name="hall_color" class="form-control" id="hall_color"
                                               value="{{ old('hall_color', $agenda->hall_color ?? '#FFFFFF') }}">
                                        @error('hall_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="session">Session</label>
                                        <input type="text" name="session"
                                               class="form-control {{ $errors->has('session') ? 'is-invalid' : '' }}"
                                               id="session" value="{{ old('session', $agenda->session) }}"
                                               placeholder="Enter the Session">
                                        @error('session')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="session_color">Select Session Color</label>
                                        <input type="color" name="session_color" class="form-control" id="session_color"
                                               value="{{ old('session_color', $agenda->session_color ?? '#FFFFFF') }}">
                                        @error('session_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time">Select Session Start & End Time</label>
                                        <div class="d-flex">
                                            <input type="time" name="start_time"
                                                   class="form-control {{ $errors->has('start_time') ? 'is-invalid' : '' }}"
                                                   id="start_time" value="{{ date('H:i', strtotime($startTime)) }}"
                                                   placeholder="Select start time">
                                            <span class="mx-2">-</span>
                                            <input type="time" name="end_time"
                                                   class="form-control {{ $errors->has('end_time') ? 'is-invalid' : '' }}"
                                                   id="end_time" value="{{ date('H:i', strtotime($endTime)) }}"
                                                   placeholder="Select end time">
                                        </div>
                                        @error('start_time')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        @error('end_time')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_time_color">Select Session Start & End Time Color</label>
                                        <input type="color" name="start_time_color" class="form-control"
                                               id="start_time_color"
                                               value="{{ old('start_time_color', $agenda->start_time_color ?? '#FFFFFF') }}">
                                        @error('color_code')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="event_date">Select Date</label>
                                        <input type="date" name="event_date"
                                               class="form-control  {{ $errors->has('event_date') ? 'is-invalid' : '' }}"
                                               id="event_date" value="{{ old('event_date', $eventDate) }}"
                                               placeholder="Select Conference Date">
                                        @error('event_date')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="event_date_color">Select Date Color</label>
                                        <input type="color" name="event_date_color"
                                               class="form-control {{ $errors->has('event_date_color') ? 'is-invalid' : '' }}"
                                               id="event_date_color"
                                               value="{{ old('event_date_color', $agenda->event_date_color ?? '#FFFFFF') }}">
                                        @error('event_date_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="track">Track name</label>
                                        <input type="text" name="track"
                                               class="form-control  {{ $errors->has('track') ? 'is-invalid' : '' }}"
                                               id="track" value="{{ old('name', $agenda->track) }}"
                                               placeholder="Enter Your Track No With Name Here">
                                        @error('track')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="track_color">Select Track Color</label>
                                        <input type="color" name="track_color" class="form-control" id="track_color"
                                               value="{{ old('track_color', $agenda->track_color ?? '#FFFFFF') }}">
                                        @error('track_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chair_speaker">Chair Speaker</label>
                                        <textarea name="chair_speaker"
                                                  class="form-control {{ $errors->has('chair_speaker') ? 'is-invalid' : '' }}"
                                                  id="chair_speaker"
                                                  placeholder="Enter the Chair Speaker">{{ old('chair_speaker', $agenda->chair_speaker) }}</textarea>
                                        @error('chair_speaker')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chair_speaker_color">Select Chair Speaker Color</label>
                                        <input type="color" name="chair_speaker_color"
                                               class="form-control {{ $errors->has('chair_speaker_color') ? 'is-invalid' : '' }}"
                                               id="chair_speaker_color"
                                               value="{{ old('chair_speaker_color',$agenda->chair_speaker_color ?? '#FFFFFF') }}">
                                        @error('chair_speaker_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="topic">Topic</label>
                                        <textarea name="topic"
                                                  class="form-control {{ $errors->has('topic') ? 'is-invalid' : '' }}"
                                                  id="topic"
                                                  placeholder="Update the Topic">{{ old('topic', $agenda->topic) }}</textarea>
                                        @error('topic')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="topic_color">Select Topic Color</label>
                                        <input type="color" name="topic_color"
                                               class="form-control {{ $errors->has('topic_color') ? 'is-invalid' : '' }}"
                                               id="topic_color"
                                               value="{{ old('topic_color', $agenda->color ?? '#FFFFFF') }}">
                                        @error('topic_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ceremony">Update the Record for Opening/Closing Ceremony, Coffee
                                            Break & Lunch Symposium
                                            Symposium </label>
                                        <textarea name="ceremony"
                                                  class="form-control {{ $errors->has('ceremony') ? 'is-invalid' : '' }}"
                                                  id="topic"
                                                  placeholder="Update the Record for Opening/Closing Ceremony, Coffee Break & Lunch Symposium etc">{{ old('ceremony', $agenda->ceremony) }}</textarea>
                                        @error('ceremony')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ceremony_color">Select Ceremony Color</label>
                                        <input type="color" name="ceremony_color"
                                               class="form-control {{ $errors->has('ceremony_color') ? 'is-invalid' : '' }}"
                                               id="ceremony_color"
                                               value="{{ old('ceremony_color', $agenda->ceremony_color ?? '#FFFFFF') }}">
                                        @error('ceremony_color')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="active">Active</label>
                                <div>
                                    <input type="checkbox" name="active" id="active"
                                           {{ ($agenda->active) ?'checked':'' }} data-bootstrap-switch
                                           data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('agenda.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {{ Form::close() }}
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
@endsection
