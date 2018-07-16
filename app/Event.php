<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model

{
    protected $appends = array('likes', 'email');

    public function getLikesAttribute()
    {
        $likes = Like::where('event_id', $this->id)->count();

        return $likes;
    }

    public function getEmailAttribute()
    {
        $organiser = User::find($this->organiser_id);

        return $organiser->email;
    }
}
