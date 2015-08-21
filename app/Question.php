<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'stages_id',
    	'qtitle',
    	'ans1_title',
    	'ans2_title',
    	'ans3_title',
    	'ans4_title',
    	'ans5_title',
    	'ans6_title',
    	'answer',
    	'detailed'
    ];
}
