@extends('layouts.app')

@section('content')
<h2>Card</h2>

<form action="" method="post">
@csrf
    <div>
        <label for="bg_color">Hintergrundfarbe (Hex):</label>
        <input name="bg_color" id= "bg_color" type="text"></input>
    </div>
    <div>
        <input type="submit" formaction="/cards" value="speichern"/>
    </div>
</form>
@endsection

