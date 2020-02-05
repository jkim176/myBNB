<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function getIncrementing()   // uuid
    {
        return false;
    }

    public function getKeyType()    // uuid
    {
        return 'string';
    }
}
