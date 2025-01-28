@extends("layout")

@section("naslovStranice")
    Glavna stranica
@endsection

@section("sadrzajStranice")

    @if($sat >=0 && $sat<=12)
        <p>Dobro jutro!

    @else
        <p>Dobar dan!</p>
    @endif

    @foreach($products as $product)
        <p>{{$product->name}}</p>
    @endforeach

    <form method="POST" action="{{route("contact.send")}}">

        @if($errors->any())
        <p>Greska:{{$errors->first()}}</p>
        @endif

        {{csrf_field()}}
        <input name="email" type="email" placeholder="Unesite vasu email adresu">
        <input name="subject" type="text" placeholder="Unesite naslov poruke">
        <textarea name="description"></textarea>
        <button>Posalji poruku</button>
    </form>

    <p>Trenutno sati je {{$sat}}</p>
    <p>Trenutno vreme je {{$trenutnoVreme}}</p>
@endsection




