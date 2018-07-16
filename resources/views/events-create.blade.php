@extends('layouts.template')

@section('content')
    <form method="post" action="/events" enctype="multipart/form-data">
        Name:<br>
        <input type="text" name="name" ><br>
        Description:<br>
        <input type="text" name="description"><br>
        Place:<br>
        <input type="text" name="place"><br>
        Category:<br>
        <select class="form-control" name="category" style="width: 180px;"> <br>
            <option>Sports</option>
            <option>Culture</option>
            <option>Other</option>
        </select>
        Date:<br>
        <input type="text" name="date" placeholder="YYYY-MM-DD HH:MM:SS"><br>

        Image:<br>
        <input type="file" name="image" id="image" ><br>
        <input type="submit" value="Submit">
        @csrf

    </form>


@endsection