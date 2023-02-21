<!DOCTYPE html>
<html lang="en">
<head>
    <title>CommentSold!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</head>
<body>
<style>
    .btn-small {
        --bs-btn-padding-y: .25rem;
        --bs-btn-padding-x: .5rem;
        --bs-btn-font-size: .75rem;
    }
    div.form-group {
        margin-bottom: 1em;
    }
    table.dataTable thead th,
    table.dataTable thead td,
    table.dataTable tbody th,
    table.dataTable tbody td {
        font-size: 0.9em;
        padding: 4px 5px;
    }
</style>
<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="/">CommentSold!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (App\Support\Helpers::authCheck())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">Inventory</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>--}}
{{--                    </li>--}}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-2">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@yield('content')
</div>
</body>
</html>
