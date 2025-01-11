@extends("layout")

@section("naslovStranice")
    Contact
@endsection

@section("sadrzajStranice")
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1">Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1">Message</label>
            <input type="text" name="message" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11234.95092844507!2d19.844262614648443!3d45.25309598689674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b106f6b2073d3%3A0x75a418081d9d54a4!2z0JTRg9C90LDQstGB0LrQuCDQv9Cw0YDQug!5e0!3m2!1ssr!2srs!4v1736590934646!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
