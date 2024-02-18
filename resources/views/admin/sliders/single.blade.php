<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>Name</td>
            <td>{{$r->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$r->Image}}</td>
        </tr>
        <td>
            @isset($slider->image)
                <img src="{{ asset('uploads/gallery/' . $slider->image) }}" width="100" height="80">
            @endisset
        </td>
        <tr>
            <td>Status</td>
            <td>
                @if($slider->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$user->created_at}}</td>
        </tr>

        </tbody>
    </table>
</div>
