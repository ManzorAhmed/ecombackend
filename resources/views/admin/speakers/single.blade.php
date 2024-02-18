<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{  $speaker->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{$speaker->name}}</td>
        </tr>
        <tr>
            <td>Country</td>
            <td>{{$speaker->country}}</td>
        </tr>
        <tr>
            <td>Heading Title</td>
            <td>{{$speaker->title}}</td>
        </tr>
        <tr>
            <td>Speaker Details</td>
            <td>{{$speaker->paragraph}}</td>
        </tr>
        <tr>
            <td>Image</td>
            <td>
                @isset($speaker->image)
                    <img src="{{ asset('uploads/Faculty/' . $speaker->image) }}" width="100" height="80">
                @endisset
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($speaker->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$speaker->created_at}}</td>
        </tr>

        </tbody>
    </table>
</div>
