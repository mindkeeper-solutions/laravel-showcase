@extends('layouts.app')

@section('content')
    <h1>Cards</h1>

    <ul>
@forelse ($cards as $card)
        <li>Hintergrundfarbe: #{{ $card->bg_color }}</li>
@empty
        <li>Bislang keine Cards enthalten.</li>
@endforelse
    </ul>
@endsection

