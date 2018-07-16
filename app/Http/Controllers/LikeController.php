<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($id)
    {
        $like = new Like();
        $like->event_id = $id;
        $like->save();

        return redirect('/events/' . $id);
    }
}
