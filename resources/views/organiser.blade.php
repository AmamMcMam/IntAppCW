@extends('layouts.template')

@section('header')
    <h1>Events organised by you</h1>
@endsection

@section('content')

    <div class="row">



        @foreach($events as $event)
            <div class="card" style="width: 30%; margin-top:5px; margin-right: 5px">
                {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                <div class="card-body">

                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">{{ $event->description }} <br>
                        Likes: {{ $event->likes }} <br>
                        Category: {{ $event->category }}
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
