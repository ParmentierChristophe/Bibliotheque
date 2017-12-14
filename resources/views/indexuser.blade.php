@extends('layouts.welcome')

@section('test')
    <a href="{{ action('BookController@index') }}" class="button is-danger">home</a>
    <hr>
    @foreach($users as $user)
        @if($user->books)
            <p>{{$user->name}} a emprunté :</p>
            @foreach($user->books as $book)
                <a href="{{ action('BookController@show',  $book->id)}}"> ► {{$book->titre}}</a>
            @endforeach
            <hr>

        @endif
    @endforeach



@stop