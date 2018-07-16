@extends('layouts.template')

@section('header')
    <h1>Events</h1> <br>


     Sort By:

    <a class="nav-tabs py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/events/organiser') }}">Your events</a>
    <a class="nav-tabs py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/category/Sports') }}">Sport</a>
    <a class="nav-tabs py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/category/Culture') }}">Culture</a>
    <a class="nav-tabs py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/category/Other') }}">Other</a>
    <a class="nav-tabs py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/datesorted') }}">Date</a>
    <a class="nav-tabs py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/mostliked') }}">Likeness</a>



@endsection

@section('content')

    {{--<h3>Sort by <br></h3>--}}

    <div class="row">



    @foreach($events as $event)
        <div class="card" style="width: 30%; margin-top:5px; margin-right: 5px">
            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
            <div class="card-body">

                <h5 class="card-title">{{ $event->name }}</h5>
                <p class="card-text">{{ $event->description }} <br>
                    Time/Date: {{ $event->dateTime }}
                </p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">View</a>
            </div>
        </div>
    @endforeach

        {{--<div class="col col-40">col</div>--}}
        {{--<div class="col col-40">col</div>--}}
        {{--<div class="col col-40">col</div>--}}
        {{--<div class="col col-40">col</div>--}}
    </div>

@endsection
