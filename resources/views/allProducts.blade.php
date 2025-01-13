@extends("layout")

@section("sadrzajStranice")

    <h1 class="text-center my-4">Svi proizvodi</h1>

    <div class="container">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
            <tr>
                <th>Ime</th>
                <th>Opis</th>
                <th>Količina</th>
                <th>Cena</th>
                <th>Slika</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
