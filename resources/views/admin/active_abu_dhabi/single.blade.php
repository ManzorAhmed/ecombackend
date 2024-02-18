<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{ $booking->id }}</td>
        </tr>
        <tr>
            <td>First Name</td>
            <td>{{ $booking->first_name }}</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>{{ $booking->last_name }}</td>
        </tr>
        <tr>
            <td>Team Name</td>
            <td>{{ $booking->team_name }}</td>
        </tr>
        <tr>
            <td>Participant Name</td>
            <td>
                @foreach($booking->participants as $participant)
                    {{ $participant->name }}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{ $booking->created_at }}</td>
        </tr>
        </tbody>

    </table>
</div>
