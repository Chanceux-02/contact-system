@include('partials.header')

    <form action="{{route('register')}}" method="post">
        @csrf
    
        <input type="text" name="name" placeholder="Input Your Fullname">
        <input type="text" name="email" placeholder="Input Your Email">
        <input type="password" name="password" placeholder="Input Your Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Your Password">
        <button type="submit" name="submit">Log in</button>
    </form>

@include('partials.footer')
