@extends("layout")

@section("naslovStranice")
    Glavna stranica
@endsection

@section("sadrzajStranice")
    <p>Trenutno vreme je {{ date("h:i:s") }}</p>
@endsection




