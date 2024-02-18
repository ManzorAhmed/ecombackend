<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{ $r->id }}</td>
        </tr>
        <tr>
            <td>Headings</td>
            <td>
            @if(isset($content) && is_array($content) && isset($content[0]['field_headings']))
                {{ $content[0]['field_headings'] }}
            @else
                <!-- Handle the case when $content is null or not an array or when field_headings is not set -->
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{ $r->created_at }}</td>
        </tr>
        </tbody>

    </table>
</div>
