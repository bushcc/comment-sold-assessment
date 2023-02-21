@extends('base_layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h4>Products</h4>
        </div>
    </div>
{{--    <div class="mb-2">--}}
{{--        <a class="btn btn-small btn-primary" href="{{ route('products.create') }}">Add a New Product</a><br><br>--}}
{{--    </div>--}}
    <div class="card-body">
        <table class="table table-bordered table-striped yajra-datatable" id="datatable-products">
            <thead>
            <tr>
                <th>Name</th>
                <th>Style</th>
                <th>Brand</th>
                <th>Quantity</th>
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
            $('#datatable-products').DataTable({
                ajax: "{{ url('products') }}",
                columns: [
                    {data: 'product_name', name: 'product_name'},
                    {data: 'style', name: 'style'},
                    {data: 'brand', name: 'brand'},
                    {data: 'quantity', name: 'quantity'},
                ],
                pageLength: 25,
                processing: true,
                serverSide: true,
                order: [[0, 'asc']]
            });
            {{--$('body').on('click', '.delete', function () {--}}
            {{--    if (confirm("Delete Record?") === true) {--}}
            {{--        let id = $(this).data('id');--}}
            {{--        // ajax--}}
            {{--        $.ajax({--}}
            {{--            type: "POST",--}}
            {{--            url: "{{ url('products.delete') }}",--}}
            {{--            data: {id: id},--}}
            {{--            dataType: 'json',--}}
            {{--            success: function (res) {--}}
            {{--                let oTable = $('#datatable-crud').dataTable();--}}
            {{--                oTable.fnDraw(false);--}}
            {{--            }--}}
            {{--        });--}}
            {{--    }--}}
            {{--});--}}
        });
    </script>
@endsection
