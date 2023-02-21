@extends('base_layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h3>Add Product</h3>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                            @error('product_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Style:</strong>
                            <input type="text" name="style" class="form-control" placeholder="Style">
                            @error('style')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Brand:</strong>
                            <input type="text" name="brand" class="form-control" placeholder="Brand">
                            @error('brand')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-small btn-primary">Submit</button>
                <a class="btn btn-small btn-primary" href="{{ route('products.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
