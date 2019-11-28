<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function show($slug)
    {
        $card = Card::where('slug', $slug)->firstOrFail();

        return view('pages.card',compact('card'));
    }
}
