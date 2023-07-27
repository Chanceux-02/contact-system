@include('partials.header')
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button class="btn btn-link" type="submit" name="submit">Logout</button>
    </form>

    <form action="{{route('add-contact')}}" method="post" class="mt-5">
        @csrf
    
        <input type="text" name="name" placeholder="Input Your Fullname">
        <input type="text" name="company" placeholder="Input Your Company">
        <input type="text" name="phone" placeholder="Input Your Phone">
        <input type="text" name="email" placeholder="Input Your Email">
        <button type="submit" name="submit">Add Contact</button>
    </form>

@include('partials.footer')
