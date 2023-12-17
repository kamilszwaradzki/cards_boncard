<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use Inertia\Inertia;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::paginate(15)->through(function ($card) {
            return [
                'id' => $card->id,
                'PIN' => $card->PIN,
                'card_number' => $card->card_number,
                'active_date' =>  $card->active_date,
                'expiry_date' => $card->expiry_date,
                'saldo' => $card->saldo,
                'show_url' => route('cards.show', $card),
                'edit_url' => route('cards.edit', $card),
            ];
        });
        
        return Inertia::render('Card/Index', ['cards' => $cards, 'create_url' => route('cards.create'),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Card/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|digits:20',
            'PIN' => 'required|digits:4',
            'active_date' => 'required',
            'expiry_date' => 'required',
            'saldo' => 'required|decimal:2',
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
        return Inertia::render('Card/Show', ['card' => [
            'id' => $card->id,
            'PIN' => $card->PIN,
            'card_number' => $card->card_number,
            'active_date' =>  $card->active_date,
            'expiry_date' => $card->expiry_date,
            'saldo' => $card->saldo,
            'edit_url' => route('cards.edit', $card),
        ]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return Inertia::render('Card/Edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $validated = $request->validate([
            'card_number' => 'required|digits:20',
            'PIN' => 'required|digits:4',
            'active_date' => 'required',
            'expiry_date' => 'required',
            'saldo' => 'required|decimal:2',
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
        $card->delete();
        return to_route('cards.index');
    }
}
