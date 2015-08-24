<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model {

	protected $fillable = [
		'user_id',
		'user_name',
		'category_id',
		'score',
	];

}
