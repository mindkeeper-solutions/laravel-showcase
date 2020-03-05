<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cards = Card::all();

        $cards_with_allowance = $cards->map(function ($card, $_key) use($user) {
            $card->is_allowed = $user->cards->contains($card) == true;
            return $card;
        });

        return view('card.index', ['cards' => $cards_with_allowance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = new Card;

        $card->bg_color = $request->bg_color;

        $card->save();
        return redirect()->action('CardController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        // dd($card);
        return view('card.show', ['card' => $card]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('card.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $card->bg_color = $request->bg_color;
        $card->save();

        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->action('CardController@index');
    }

    // Generate and respond with business card containing the user's name.
    public function generate_svg(Card $card)
    {
        $user = Auth::user();

        $svg_image_source = $card->get_svg_for_name($user->name);

        return response()
            ->make($svg_image_source)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Content-Length', strlen($svg_image_source));
    }

    // Toggle the rightg to use the given business card for the actual user.
    public function toggle_allowance(Card $card)
    {
        $user = Auth::user();

        if ($user->cards->contains($card) == true)
        {
            $user->cards()->detach($card);
        }
        else
        {
            $user->cards()->attach($card);
        }

        return redirect()->route('cards.index');
    }
}https://www.php.net/manual-lookup.php?pattern=%3F&scope=quickref
