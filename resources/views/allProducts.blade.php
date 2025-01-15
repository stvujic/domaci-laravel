@extends("layout")

@section("sadrzajStranice")

    <h1 class="text-center my-4">Svi proizvodi</h1>

    <div class="container">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Opis</th>
                <th>Količina</th>
                <th>Cena</th>
                <th>Slika</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                    <td>
                        <a href="{{route("obrisiProizvod", ["product" =>$product->id])}}" class="btn btn-danger">Obrisi</a>
                        <a class="btn btn-primary">Edituj</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
