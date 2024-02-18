<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{$r->id }}</td>
        </tr>
        <tr>
            <td>Headings</td>
            <td>{{$content[0]['headings']}}</td>
        </tr>
        <tr>
            <td>Paragraph Details</td>
            <td>{{$content[0]['paragraphs']}}</td>
        </tr>

        <tr>
            <td>Created at</td>
            <td>{{$r->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
