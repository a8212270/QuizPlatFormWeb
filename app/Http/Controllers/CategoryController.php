<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function getCategoryList(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', $data['user_id'])->first();

        $Category = Category::where('company_id', $user['company_id'])->get();
        //$Stage = Stage::where('category_id',)->get();

        //return response()->json(['RetCode' => $Category[1]['title']]);

            //$Category[i]['title']
            return response()->json([
            'RetCode' => '1', 
            'Content' => $Category,
            ]);
    }


}
