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

    <p>Trenutno sati je {{$sat}}</p>
    <p>Trenutno vreme je {{$trenutnoVreme}}</p>
@endsection




