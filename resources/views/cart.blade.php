@extends("layout")

@section("sadrzajStranice")

   @foreach($products as $product)
    <p>{{$product->name}}</p>
   @endforeach


@endsection
