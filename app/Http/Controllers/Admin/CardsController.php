<?php

namespace App\Http\Controllers\Admin;

use App\Card;
use App\Http\Requests\CardsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();

        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardsRequest $request)
    {
        $card = Card::add($request->all());
        $card->uploadImage($request->file('image'));

        return redirect()->route('cards.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::find($id);

        return view('admin.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardsRequest $request, $id)
    {
        $card = Card::find($id);
        $card->edit($request->all());
        $card->uploadImage($request->file('image'));

        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Card::find($id)->remove();

        return redirect()->route('cards.index');
    }

    public function show($slug)
    {
        $card = Card::where('slug', $slug)->firstOrFail();

        return view('pages.card',compact('card'));
    }
}
