<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;


class BookController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$books = Book::paginate( 5 );
		$users = User::all();


		return view( 'table', compact( 'books', 'users' ) );
	}

	public function selectBook( $id ) {
		$book = Book::findOrFail( $id );
		dd( $book );
	}


	public function addUser( Request $request, $id ) {

		Book::findOrFail( $id )->update( [
			'user_id' => $request->input( 'user' )
		] );

		return redirect( route( 'index' ) );


	}

	public function returnBook( $id ) {
		$book = Book::findOrFail( $id );

		$book->user_id = null;
		$book->save();

		return redirect( route( 'index' ) );

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public
	function create() {
		$books = Book::all();

		return view( 'form', compact( 'books' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( BookRequest $request ) {
		$book = new Book();
		$book->fill( $request->all() );
		$book->save();

		return redirect( route( 'index' ) );

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$book = Book::findOrFail( $id );

		return view( 'book', compact( 'book' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$book = Book::find( $id );

		return view( 'edit', compact( 'book' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( BookRequest $request, $id ) {
		$book = Book::find( $id );

		$book->update( $request->all() );

		return redirect( route( 'index' ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {

		Book::find( $id )->delete();

		return redirect( route( 'index' ) );
	}
}
