<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bookable;
use App\Http\Resources\BookableResource;
use App\Http\Resources\BookableCollection;

class BookableController extends Controller
{
    public function index()
    {
        return new BookableCollection(Bookable::all());
    }

    public function show($id)
    {
        return new BookableResource(Bookable::findOrFail($id));
    }
}
