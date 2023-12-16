<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('card.index', ['cards' => Card::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|unique:cards|max:20',
            'PIN' => 'required|max:4',
            'active_date' => 'required',
            'expiry_date' => 'required',
            'saldo' => 'required',
        ]);
        $card = Card::create([
            'card_number' => $validated['card_number'],
            'PIN' => $validated['PIN'],
            'active_date' => $validated['active_date'],
            'expiry_date' => $validated['expiry_date'],
            'saldo' => $validated['saldo'],
        ]);

        return to_route('cards.show', ['card' => $card]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return view('card.show', ['card' => $card]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return view('card.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $validated = $request->validate([
            'card_number' => 'required|max:20',
            'PIN' => 'required|max:4',
            'active_date' => 'required',
            'expiry_date' => 'required',
            'saldo' => 'required',
        ]);

        $card->card_number = $validated['card_number'];
        $card->PIN = $validated['PIN'];
        $card->active_date = $validated['active_date'];
        $card->expiry_date = $validated['expiry_date'];
        $card->saldo = $validated['saldo'];
        $card->save();

        return to_route('cards.show', ['card' => $card]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
