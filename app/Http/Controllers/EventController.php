<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Sodium\version_string;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('events')->with(array('events' => $events));
    }

    public function view($id)
    {
        $event = Event::find($id);

        return view('events-view')->with(array('event' => $event));
    }

    public function mostLiked()
    {
        $events = Event::all();
        $events = $events->sortByDesc('likes');

        return view('likes')->with(array('events' => $events));
    }

    public function dateSorted()
    {
        $events = Event::all();
        $events = $events->sortByDesc('dateTime');

        return view('date')->with(array('events' => $events));
    }

    public function organiser()
    {
        $events = array();

        if (Auth::check()) {
            $events = Event::where('organiser_id', Auth::id())->get();
        }

        return view('organiser')->with(array('events' => $events));

    }

    public function category($categoryName)
    {
        $categoryName = strtoupper($categoryName);

        $events = Event::where('category', $categoryName)->get();

        return view('category')->with(array('events' => $events));
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('events-update')->with(array('event' => $event));
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $place = $request->input('place');
        $category = $request->input('category');
        $date = $request->input('date');
        $organiser_id = Auth::id();

        $event = new Event();

        if ($request->has('image')) {
            $validator = Validator::make($request->all(),
                array('image' => 'mimes:jpeg,bmp,png')

            );

            if(!$validator->valid()) {
                return redirect()->back()->with('errors', $validator->errors());
            }


            $image = $request->file('image');

            $filename = now()->timestamp . $image->getClientOriginalName();

            $image->move('uploads', $filename);

            $event->picture = $filename;
        }
        else{
            $event->picture = 'noImage.png';
        }



        $event->name = $name;
        $event->description = $description;
        $event->place = $place;
        $event->category = strtoupper($category);
        $event->dateTime = $date;
        $event->organiser_id = $organiser_id;

        $event->save();

        return redirect('/events');
    }

    public function create()
    {
        return view('events-create');
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $name = $request->input('name');
            $description = $request->input('description');
            $dateTime = $request->input('date');
            $category = $request->input('category');
            $place = $request->input('place');

            $aston_event = Event::find($request->input('eventId'));

            if ($aston_event->organiser_id == Auth::id()) {
                $aston_event->name = $name;
                $aston_event->description = $description;
                $aston_event->dateTime = $dateTime;
                $aston_event->organiser_id = Auth::id();
                $aston_event->place = $place;
                $aston_event->category = $category;
                $aston_event->save();
            }
        }
        return redirect('/events');
    }

}
