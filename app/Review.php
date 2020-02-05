<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getIncrementing()   // uuid
    {
        return false;
    }

    public function getKeyType()    // uuid
    {
        return 'string';
    }
}
