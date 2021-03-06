<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $fillable = [
		'user_id',
		'question_id',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
