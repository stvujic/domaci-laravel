@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="/admin/save-product">
        {{csrf_field()}}
        <div>
            <div>
                <label>Ime</label>
                <input type="text" name="name" placeholder="Unesite ime proizvoda">
            </div>

            <div>
                <label>Opis</label>
                <input type="text" name="description" placeholder="Unesite opis">
            </div>

            <div>
                <label>Kolicina</label>
                <input type="text" name="amount" placeholder="Unesite kolicina">
            </div>

            <div>
                <label>Cena</label>
                <input type="text" name="price" placeholder="Unesite cena">
            </div>

            <div>
                <label>Slika</label>
                <input type="text" name="image" placeholder="Unesite sliku">
            </div>

            <button>Kreiraj proizvod</button>
        </div>
    </form>
@endsection



