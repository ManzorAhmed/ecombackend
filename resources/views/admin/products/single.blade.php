<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>

        <tr>
            <td>ID</td>
            <td>{{  $navbar->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $navbar->name }}</td>
        </tr>
        <tr>
            <th>Parent Menu</th>
            <td>
                @if ($navbar->parent)
                    {{ $navbar->parent->name }}
                @else
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <td>Link</td>
            <td>
                <a href="{{ $navbar->link }}" target="_blank"
                   class="btn btn-info btn-sm" title="View Url">View</a>
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{ $navbar->created_at }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($navbar->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
