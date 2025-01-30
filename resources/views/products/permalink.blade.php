@extends("layout")

@section("naslovStranice")
    Permalink
@endsection

@section("sadrzajStranice")
    <p>{{$product->name}}</p>
    <form action="{{route("cart.add")}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="text" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection
