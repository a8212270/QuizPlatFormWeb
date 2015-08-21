<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Stage;
use App\UserRecord;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StageController extends Controller
{
    public function getStageList(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', $data['user_id'])->first();

        $Stage = Stage::where('category_id', $data['stage_id'])->get();

        $UserRecord = UserRecord::where('user_id',  $user['id'])->get();

        for ($i = 0; $i < count($Stage); $i++) {
            $Stage[$i]['sort'] = ($Stage[$i]['id'] % 100);
        }

        if (count($UserRecord) == 0) {
            for ($i = 0; $i < count($Stage); $i++) {
                $Stage[$i]['accuracy'] = 0;
            }

            for ($i = 0; $i < count($Stage); $i++) {
                $Stage[$i]['status'] = 4;
            }
        } else {
            for ($i = 0; $i < count($Stage); $i++) {
                $UserAccuracy = UserRecord::orderBy('stage_score', 'desc')->where('stages_id', $Stage[$i]['id'])->first();
                if ($UserAccuracy == null) {
                    $Stage[$i]['accuracy'] = 0;
                } else {
                    $Stage[$i]['accuracy'] = $UserAccuracy['accuracy'];
                }
            }

            for ($i = 0; $i < count($Stage); $i++) {
                $UserStatus = UserRecord::orderBy('stage_score', 'desc')->where('stages_id', $Stage[$i]['id'])->first();
                if ($UserStatus == null) {
                    $Stage[$i]['status'] = 4;
                } else {
                    $Stage[$i]['status'] = $UserStatus['status'];
                }
                
            }
        }

        // $UserRecord = UserRecord::where('user_id',  2)->get();
        // $StageRecord = $UserRecord->where('stages_id', 102)->first();

        return response()->json([
            'RetCode' => '1', 
            'Content' => [ 
                'stages' => $Stage,
                ]
                    
            ]);
    }
}
