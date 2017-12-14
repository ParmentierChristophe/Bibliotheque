@extends('.layouts.welcome')


@section('test')
    <div class="columns is-centered">
        <div class="column is-8">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title title is-centered">
                        {{ $book->titre }}

                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <p class="subtitle is-3">Resume :</p>

                        {{$book->resume}}
                    </div>
                </div>
                <footer class="card-footer">
                    <p class="card-footer-item">Year publication : {{$book->year}}</p>
                    <p class="card-footer-item">Author : {{ $book->auteur }}</p>
                    @if(!$book->user)
                        <a href="#" class="card-footer-item">Disponible</a>
                    @else
                        <a href="#" class="card-footer-item">{{$book->user->name}}</a>
                    @endif
                </footer>
            </div>
        </div>
    </div>

    <p>
        <a class="button is-info" href="{{ action('BookController@index') }}">Home</a>
        <a class="button is-primary" href="{{ URL::previous() }}">Back</a>

    </p>


@stop