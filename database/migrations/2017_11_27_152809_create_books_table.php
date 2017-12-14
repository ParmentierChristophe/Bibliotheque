<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'books', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'titre' );
			$table->string( 'auteur' );
			$table->text( 'resume' );
			$table->integer( 'year' );
			$table->string( 'categories' );
			$table->boolean( 'status' )->default( true );
			$table->integer( 'user_id' )->unsigned()->nullable();
			$table->timestamps();


		} );

		Schema::table( 'books', function ( $table ) {
			/* Créee la clef étrangère et empeche de pouvoir supprimer un utilisateur si il a un bouquin emprunté*/
			$table->foreign( 'user_id' )->references( 'id' )->on( 'users' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'books' );
	}
}
