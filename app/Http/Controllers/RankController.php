<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Score;
use App\UserRecord;

class RankController extends Controller {

	public function getRank(Request $request)
	{
		$data = $request->all();

		$score = Score::orderBy('score', 'desc')->where('category_id', $data['category_id'])->get();
		return response()->json([
            'RetCode' => '1', 
            'Content' => $score
            ]);
	}

}
