@extends('layouts.app')

@section('content')
    <h1>Cards</h1>

    <ul>
@forelse ($cards as $card)
        <li><img src="{{ route('cards.generate_svg', ['card' => $card])}}" width="85mm" height="55mm"></li>
        <li>Id {{ $card->id }}, Hintergrundfarbe: #{{ $card->bg_color }}</li>
        <li>
            <form ation="{{ action('CardController@destroy', ['card' => $card]) }}">
                @csrf
                @method('destroy')
                <input type="submit" value="entfernen"/>
            </form>
            <a href="{{ route('cards.edit', ['card' => $card]) }}">bearbeiten</a>
        </li>
@empty
        <li>Bislang keine Cards enthalten.</li>
@endforelse
    </ul>
@endsection

