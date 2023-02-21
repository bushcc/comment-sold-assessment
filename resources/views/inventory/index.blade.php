@extends('base_layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h4>Inventory</h4>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped yajra-datatable" id="datatable-inventory">
            <thead>
            <tr>
                <th>Name</th>
                <th>SKU</th>
                <th>Quantity</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>Cost</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#datatable-inventory').DataTable({
                ajax: "{{ url('inventory') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'sku', name: 'sku'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'color', name: 'color'},
                    {data: 'size', name: 'size'},
                    {data: 'price', name: 'price'},
                    {data: 'cost', name: 'cost'},
                ],
                pageLength: 25,
                processing: true,
                serverSide: true,
                order: [[0, 'asc']]
            });
        });
    </script>
@endsection
