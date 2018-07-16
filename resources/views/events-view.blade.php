@extends('layouts.template')


@section('content')

    <img height='50%' width="50%" src="/uploads/{{ $event->picture }}"/>

    <h1>{{ $event->name }}</h1>

    {{ $event->description }}
    <br> Like: {{ $event->likes}}
    <br> Contact: <a href="mailto:{{ $event->email}}"> {{ $event->email }}</a>

    <form action="/likes/{{ $event->id }}" method="post">
        @csrf
        <input type="submit" value="Like">

    </form>
    @if (Auth::id() == $event->organiser_id)
    <form action="/events/edit/{{ $event->id }}" method="get">
        @csrf
        <input type="submit" value="Edit">

    </form>
    @endif

@endsection