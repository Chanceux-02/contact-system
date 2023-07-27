@include('partials.header')
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button class="btn btn-link" type="submit" name="submit">Logout</button>
    </form>
    <form action="{{route('edit-contacts')}}" method="post" class="mt-5">
        @csrf
        
        @foreach ( $contactData as $data)
            
        @endforeach
        <input type="text" name="name" value="{{$data->name}}" placeholder="Input Your Fullname">
        <input type="text" name="company" value="{{$data->company}}" placeholder="Input Your Company">
        <input type="text" name="phone" value="{{$data->phone}}" placeholder="Input Your Phone">
        <input type="text" name="email" value="{{$data->email}}" placeholder="Input Your Email">
        <input type="hidden" name="id" value="{{$data->id}}">
        <button type="submit" name="submit">Edit Contact</button>
    </form>

@include('partials.footer')
