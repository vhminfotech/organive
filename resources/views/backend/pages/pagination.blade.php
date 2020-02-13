@extends('backend.layout.app')
@section('content')

@foreach($data as $item)
<li>{{$item->name}} </li>
@endforeach

<button class="btn">{{$data->links()}}</button>

@endsection
