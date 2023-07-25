@include('partials.header')

    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif

    <div class="d-flex justify-content-end me-5 mt-5">
        <form action="{{route('logout')}}" method="post" class="border-end">
            @csrf
            <button class="btn btn-link" type="submit" name="submit">Add Contact</button>
        </form>
        <form action="{{route('logout')}}" method="post" class="border-end">
            @csrf
            <button class="btn btn-link" type="submit" name="submit">Contacts</button>
        </form>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-link" type="submit" name="submit">Logout</button>
        </form>
    </div>
    <div class="searchbar d-flex justify-content-end me-5 mt-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
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
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link">Edit</button>
                </form>
            </td>

        </tr>
        @endforeach

    </table>
    <div class="paginate mb-5 mt-5 text-center">
        {{$contactData->links()}}
    </div>

@include('partials.footer')
