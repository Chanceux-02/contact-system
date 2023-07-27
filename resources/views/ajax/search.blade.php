<h4>Results</h4>
@foreach ( $result as $results)
    <div class="d-flex">
        <p class="px-2 border-end">{{$results->name}}</p>
        <p class="px-2 border-end">{{$results->company}}</p>
        <p class="px-2 border-end">{{$results->phone}}</p>
        <p class="px-2">{{$results->email}}</p>
    </div>
@endforeach