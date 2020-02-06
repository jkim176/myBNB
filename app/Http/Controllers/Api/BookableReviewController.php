<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bookable;
use App\Http\Resources\BookableReviewCollection;
use App\Http\Resources\BookableReviewResource;

class BookableReviewController extends Controller
{
    public function __invoke($id, Request $request)
    {
        $bookable = Bookable::findOrFail($id);

        return new BookableReviewCollection(
            $bookable->reviews()->latest()->get()
        );
    }
}
