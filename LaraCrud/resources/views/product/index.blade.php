@extends('product.layout')

@section('content')
<br><br><br>
       <div class="col-lg-12 margin-tb">
           <div>
               <h2> Product list</h2>
               <br>
           </div>
           <div>
               <a class="btn btn-success" href="">Create product</a>
           </div>

       </div>
<br>
    <table class="table table-bordered">

        <tr>

                <th width="150px">Product name</th>
                <th width="150px">Product code</th>
                <th width="200px">Details </th>
                <th width="150px">logo </th>
                <th width="150px">action </th>
        </tr>
        <tr>
            @foreach($products as $pro)
                <td>{{ $pro->product_name }} </td>
                <td>{{ $pro->product_code }}</td>
                <td>{{ $pro->details }} </td>
                <td></td>
                <td>
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            @endforeach
        </tr>

    </table>



@endsection
