@extends('layouts.template')

@section('content')
    <form method="post" action="{{ action('EventController@update') }}" enctype="multipart/form-data">
        <input type="hidden" value="{{ $event->id }}" name="eventId">
        Name:<br>
        <input type="text" name="name" value="{{ $event->name }}"><br>
        Description:<br>
        <input type="text" name="description" value="{{ $event->description }}"><br>
        Place:<br>
        <input type="text" name="place" value="{{ $event->place }}"><br>
        Category:<br>
        <select class="form-control" name="category" style="width: 180px;" value="{{ $event->category }}"> <br>
            <option>Sports</option>
            <option>Culture</option>
            <option>Other</option>
        </select>
        Date:<br>
        <input type="text" name="date" value="{{ $event->dateTime }}"><br>

        Image:<br>
        <input type="file" name="image" id="image"><br>
        <input type="submit" value="Submit">
        @csrf

    </form>


@endsection