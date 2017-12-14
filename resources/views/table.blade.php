@extends('layouts.welcome')

@section('test')
    <p class="title">La Beer by O'tec</p>
    <hr>

    {{-- CATEGORIE NON FONCTIONEL--}}
    {{--   <div class="field">
           <div class="control">
               <div class="select">
                   <select>
                       <option>Select Categories</option>
                       @foreach($books as $book)
                           <option>{{$book->categories}}</option>
                       @endforeach
                   </select>
               </div>
           </div>
       </div>--}}


    {{-- TABLEAU --}}
    <table class="table is-bordered is-striped">
        <thead>
        <tr>
            <th>Numéro</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Categories</th>
            <th>Emprunteur</th>
            <th>Option</th>

        </tr>
        </thead>
        <tbody>
        @foreach ( $books as $book )

            {{--AFFICHAGE SI IL N'Y A PAS D'USER--}}
            @if ( ! $book->user )


                <tr>
                    <th>{{ $book->id }}</th>
                    <td><a href="{{ action('BookController@show',  $book->id)}}">{{ $book->titre }}</a></td>
                    <td>{{ $book->auteur }}</td>
                    <td>{{ $book->categories }}</td>
                    <td>Disponible</td>
                    <td>
                        <div class="field is-grouped">
                            <p class="control">
                                <a href="{{ action('BookController@edit', $book->id)}}" class="button is-link">
                                    Edit
                                </a>
                            </p>
                            <p class="control">
                                <button
                                        class="button is-success modal-button showModal" data-target="modal"
                                        data-id="{{ $book->id }}">
                                    Add borrower
                                </button>

                            </p>
                            <form action="{{ action('BookController@destroy',  $book->id)}}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" value="Delete" class="button is-danger">
                            </form>
                        </div>
                    </td>
                </tr>
                {{-- MODAL AJOUT EMPRUNTEUR--}}

                <div class="modal" id="{{$book->id}}">
                    <div class="modal-background"></div>
                    <div class="modal-content">
                        <div class="box">
                            <form action="{{ action('BookController@addUser', $book->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">Choisir un utilisateur</label>
                                    <div class="control has-text-centered">
                                        <div class="select">
                                            <select name="user">
                                                @foreach($users as $user)

                                                    <option value="{{$user->id}}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="button is-success">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                </div>



            @else
                {{--AFFICHAGE SI IL Y A UN EMPRUNTEUR--}}
                <tr>
                    <th>{{ $book->id }}</th>
                    <td><a href="{{ action('BookController@show',  $book->id)}}">{{ $book->titre }}</a></td>
                    <td>{{ $book->auteur }}</td>
                    <td>{{ $book->categories }}</td>

                    <td><a href="">{{$book->user->name}}</a></td>
                    <td>
                        <div class="field is-grouped">
                            <p class="control">
                                <a href="{{ action('BookController@edit', $book->id)}}" class="button is-link">
                                    Edit
                                </a>
                            </p>
                            <p class="control">
                                <a href="{{ action('BookController@returnBook',  $book->id)}}"
                                   class="button is-info is-outlined">
                                    Return book
                                </a>
                            </p>
                            <p class="control">
                                <input title="Disabled button" disabled type="submit" value="Delete"
                                       class="button is-danger">
                            </p>
                        </div>
                    </td>
                </tr>

            @endif

        @endforeach

        </tbody>
    </table>
    <div class="paginate">
        {{ $books->links() }}
    </div>
    {{--BOUTON D'AJOUT DE LIVRE ET VOIR LES UTILISATEURS--}}
    <a class="button is-success" href="{{ action('BookController@create') }}">Add book</a>
    <a class="button is-primary" href="{{ action('UserController@index')}}">Liste des utilisateurs</a>


@stop