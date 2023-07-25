@include('partials.header')

    @if (session('message'))
        <h3>{{session('message')}}</h3>
    @endif

   <h1>Thank you for registering!</h1>

   <a href="{{route('contacts')}}">Continue</a>

@include('partials.footer')
