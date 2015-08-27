<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Favorite;
use App\Question;

class FavoriteController extends Controller {

	public function getFavoriteList(Request $request)
	{
		$data = $request->all();

		$list = Favorite::where('user_id', 1)->get();

		for ($i=0; $i < count($list); $i++) {
			$list[$i]['question'] = Question::where('id', $list[$i]['question_id'])->first();
			$list[$i]['question']['fuckyou'] = 0;
			$list[$i]['question']['fuck'] = 0;

		}

		return response()->json([
            'RetCode' => '1', 
            'Content' => $list
            ]);
	}

	public function uploadFavoriteList(Request $request)
	{
		$data = $request->all();
	}
}
