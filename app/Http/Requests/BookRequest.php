<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'titre'      => 'bail|required|max:255',
			'auteur'     => 'bail|required|max:255',
			'resume'     => 'bail|required|max:65000',
			'year'       => 'bail|required',
			'categories' => 'bail|required|max:255',
		];
	}
}
