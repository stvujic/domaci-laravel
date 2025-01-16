@extends("layout")

@section("sadrzajStranice")

    <h1 class="text-center my-4">Svi kontakti</h1>

    <div class="container">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allContacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a href="{{route("obrisiKontakt",["contact" =>$contact->id])}}" class="btn btn-danger">Obrisi</a>
                        <a href="{{route("contact.single", ["id"=>$contact->id])}}" class="btn btn-primary">Edituj</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
