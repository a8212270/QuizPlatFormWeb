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

		$Favoritelist = Favorite::where('user_id', $data['user_id'])->get();

		for ($i = 0; $i < count($Favoritelist); $i++) {
			$Favoritelist[$i]['question'] = Question::where('id', $Favoritelist[$i]['question_id'])->first();
			$Favoritelist[$i]['question']['favorite'] = 1;
			$Favoritelist[$i]['question']['practice'] = 0;
			$Favoritelist[$i]['question']['delete'] = 0;
		}

		return response()->json([
            'RetCode' => '1', 
            'Content' => $Favoritelist
            ]);
	}

	public function updateFavoriteList(Request $request)
	{
		$data = $request->all();

		$questionResult = $data['question_id'];
        $result = explode(',', $questionResult);

        for ($i = 0; $i < count($result); $i++) {
        	Favorite::where('user_id', $data['user_id'])->where('question_id', $result[$i])->delete();
        }

        $Favoritelist = Favorite::where('user_id', $data['user_id'])->get();

		for ($i = 0; $i < count($Favoritelist); $i++) {
			$Favoritelist[$i]['question'] = Question::where('id', $Favoritelist[$i]['question_id'])->first();
			$Favoritelist[$i]['question']['favorite'] = 1;
			$Favoritelist[$i]['question']['practice'] = 0;
			$Favoritelist[$i]['question']['delete'] = 0;
		}

		return response()->json([
            'RetCode' => '1', 
            'Content' => $Favoritelist
            ]);
	}
}
