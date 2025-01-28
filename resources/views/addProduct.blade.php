@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="{{route("products.create")}}">
        {{csrf_field()}}

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
        </div>

        <div>
            <div>
                <label>Ime</label>
                <input type="text" name="name" placeholder="Unesite ime proizvoda" value="{{old("name")}}">
            </div>

            <div>
                <label>Opis</label>
                <input type="text" name="description" placeholder="Unesite opis" value="{{old("description")}}">
            </div>

            <div>
                <label>Kolicina</label>
                <input type="text" name="amount" placeholder="Unesite kolicina" value="{{old("amount")}}">
            </div>

            <div>
                <label>Cena</label>
                <input type="text" name="price" placeholder="Unesite cena" value="{{old("price")}}">
            </div>

            <div>
                <label>Slika</label>
                <input type="text" name="image" placeholder="Unesite sliku" value="{{old("image")}}">
            </div>

            <button>Kreiraj proizvod</button>
        </div>
    </form>
@endsection



