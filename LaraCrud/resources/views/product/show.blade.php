@extends('product.layout')

@section('content')
    <br><br>
    <div class="col-lg-12 margin-tb">
        <div>
            <h2> Show product</h2>
            <br>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('product.index') }}">Back </a>
        </div>
    </div>

    <br><br>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Product Name: </strong>
            {{ $data->product_name }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Product Code: </strong>
            {{ $data->product_code }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Details: </strong>
            {{ $data->details }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Logo: </strong>
            <img src="{{ URL::to($data->logo) }}" height="150px" width="150px" >
        </div>
    </div>


@endsection
