<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{$agenda->id}}</td>
        </tr>
        <tr>
            <td>Hall</td>
            <td>{{$agenda->hall}}</td>
        </tr>
        <tr>
            <td>Start & End time</td>
            <td>{{$agenda->start_time}}</td>
        </tr>
        <tr >
            <td>Event Date</td>
            <td>{{$agenda->event_date}}</td>
        </tr>
        <tr style="background-color: {{$agenda->track_color}}">
            <td>Event Track</td>
            <td>{{$agenda->track}}</td>
        </tr>
        <tr >
            <td>Event Session</td>
            <td>{{$agenda->session}}</td>
        </tr>
        <tr >
            <td>Speaker Name</td>
            <td>{{$agenda->chair_speaker}}</td>
        </tr>
        <tr>
            <td>Topic</td>
            <td>{{$agenda->topic}}</td>
        </tr>
        <tr>
            <td>Ceremony</td>
            <td>{{$agenda->ceremony}}</td>
        </tr>
        <tr>
            <td>Image</td>
            <td>
                @isset($agenda->image)
                    <img src="{{ asset('uploads/gallery/' . $agenda->image) }}" width="100" height="80">
                @endisset
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                @if($agenda->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$agenda->created_at}}</td>
        </tr>
        </tbody>

    </table>
</div>
