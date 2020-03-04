@extends('layouts.app')

@section('content')
<h2>Card</h2>

<form action="{{ action('CardController@update', ['card' => $card]) }}" method="post">
@method('patch')
@csrf
    <div>
        <label for="bg_color">Hintergrundfarbe (Hex):</label>
        <input name="bg_color" id= "bg_color" type="text" value="{{ $card->bg_color }}"></input>
    </div>
    <div>
        <input type="submit" value="speichern"/>
    </div>
</form>
@endsection

