@extends('product.layout')

@section('content')
<br><br><br>
       <div class="col-lg-12 margin-tb">
           <div>
               <h2> Product list</h2>
               <br>
           </div>
           <div>
               <a class="btn btn-success" href="{{ route('create.product') }}">Create product</a>
           </div>

       </div>
<br>
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p> {{ $message }}</p>
    </div>

    @endif

    <table class="table table-bordered">

        <tr>

                <th width="150px">Product name</th>
                <th width="150px">Product code</th>
                <th width="200px">Details </th>
                <th width="90px">logo </th>
                <th width="180px">action </th>
        </tr>
        @foreach($products as $pro)
        <tr>

                <td>{{ $pro->product_name }} </td>
                <td>{{ $pro->product_code }}</td>
                <td>
                    {{ str_limit($pro->details, $limit = 70)  }}
                </td>
                <td><img src="{{ URL::to($pro->logo) }}" height="70px" width="85px"></td>
                <td>
                    <a class="btn btn-info" href="{{ URL::to('show/product/'.$pro->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ URL::to('edit/product/'.$pro->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ URL::to('delete/product/'.$pro->id) }}"
                        onclick="return confirm('Are you sure ?')">Delete</a>
                </td>

        </tr>
        @endforeach

    </table>


    {{  $products->links() }}



@endsection
