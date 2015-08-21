<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model {

	protected $fillable = [
		'user_id',
		'stages_id',
		'accuracy',
		'accuracy_detail',
		'status',
		'status_detail',
		'stage_score'
	];

}
