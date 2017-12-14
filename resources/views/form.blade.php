@extends('layouts.welcome')


@section('test')

    <div class="container ">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="control">
                    <a href="{{ action('BookController@index') }}" class="button is-danger">Retour</a>
                </div>
                <form action="{{action('BookController@store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="titre">Titre</label>
                        <div class="control">
                            <input class="input" type="text" name="titre" id="titre"
                                   placeholder="20 milieu sous les mers, Seigneur des anneaux, ....">
                        </div>
                    </div>
                    <div class="field">
                        <label for="auth">Auteur</label>
                        <div class="control">
                            <input class="input" type="text" name="auteur" id="auth"
                                   placeholder="Jules Verne, Victor Hugo, ...">
                        </div>
                    </div>
                    <div class="field">
                        <label for="resume">Resume</label>
                        <div class="control">
                        <textarea class="textarea" type="text" name="resume" id="resume"
                                  placeholder="C'est l'histoire d'un mec...."></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label for="annee">Année de publication</label>
                        <div class="control">
                            <input class="input" type="number" name="year" id="annee"
                                   placeholder="1870, 2010, ...">
                        </div>
                    </div>
                    {{--
                                        <div class="field">
                                            <label class="label">Categories</label>
                                            <div class="control has-text-centered">
                                                <div class="select">
                                                    <select name="categories">
                                                        @foreach($books as $cat)
                                                            <option value="{{ $cat->categories }}">{{ $cat->categories }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>--}}

                    <div class="field">
                        <label class="label">Ajouter une Categorie</label>
                        <div class="control has-text-centered">
                            <input type="text" class="input" name="categories"
                                   placeholder="Roman, Policier, Aventure, ...">
                        </div>
                    </div>

                    <input class="button is-success" type="submit" name="submit" id="">
                </form>

            </div>
        </div>
    </div>
@endsection