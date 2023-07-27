@include('partials.header')

    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif

    <div class="d-flex justify-content-end me-5 mt-5">
        <a href="{{route('add-contacts')}}" class="mt-2 me-3">Add Contact</a>
        <a href="http://" class="mt-2">Contacts</a>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-link" type="submit" name="submit">Logout</button>
        </form>
    </div>
    <div class="searchbar d-flex justify-content-end me-5 mt-3">
        <form class="d-flex" role="search" method="post" action="{{route('search-results')}}">
            @csrf
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" id="searchBtn">Search</button>
          </form>
    </div>
    <div id="searchResultContainer">

    </div>

   <table class="table mt-3 border _table">
        <tr>
            <th class="border-end">Name</th>
            <th class="border-end">Company</th>
            <th class="border-end">Phone</th>
            <th class="border-end">Email</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ( $contactData as $data)
        <tr>
                
            <td>{{$data->name}}</td>
            <td>{{$data->company}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->email}}</td>
            <td>
                <a href="{{ route('edit-contact', ['id'=>$data->id]) }}">Edit</a>
            </td>
            <td>
                <a href="{{ route('delete-contact', ['id'=>$data->id]) }}" id="deleteBtn">Delete</a>
            </td>

        </tr>
        @endforeach

    </table>
    <div class="paginate mb-5 mt-5 text-center">
        {{$contactData->links()}}
    </div>

@include('partials.footer')
