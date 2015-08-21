<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	protected $fillable = [
		'user_id',
		'question_id',
		'answer',
		'second',
		'favorite'
	];

}
