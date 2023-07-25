@include('partials.header')

    <p>{{session('message')}}</p>

    <form action="{{route('login')}}" method="post">
        @csrf
    
        <input type="text" name="email" placeholder="Input Your Email">
        <input type="text" name="password" placeholder="Input Your Password">
        <button type="submit" name="submit">Log in</button>
    </form>

@include('partials.footer')
