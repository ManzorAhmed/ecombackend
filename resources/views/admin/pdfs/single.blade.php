<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <h1 class="text-center" style="font-weight: bold">PDF Details</h1>
        <tr>
            <td>Document id</td>
            <td>{{  $pdf->id }}</td>
        </tr>
        <tr>
            <td>Path</td>
            <td>{{ $pdf->file_path}}</td>
        </tr>
        <tr>
            <td>Link</td>
            <td>
                <a href="{{ $pdf->link }}" target="_blank"
                   class="btn btn-info btn-sm" title="View Url">View</a>
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{ $pdf->created_at }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($pdf->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
