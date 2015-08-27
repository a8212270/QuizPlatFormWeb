<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\UserRecord;
use App\Result;
use App\Favorite;
use App\Score;

use yajra\Datatables\Datatables;

class QuestionController extends Controller
{
    public function getQAList(Request $request)
    {
    	$data = $request->all();

        $question = Question::orderByRaw("RAND()")->where('stages_id', $data['stagesId'])->get()->take(5);
        //->take(5)

        for ($i = 0; $i < count($question); $i++) {
            $checkFavorite = Favorite::where('user_id', $data['user_id'])->where('question_id', $question[$i]['id'])->first();
            if ($checkFavorite == null) {
                $question[$i]['favorite'] = 0;
            } else {
                $question[$i]['favorite'] = 1;
            }
            
        }

    	return response()->json([
            'RetCode' => '1', 
            'Content' => [
                'image' => 'ZH4itjY.jpg',
                'questions' => $question,
                ]
            ]);
    }

    public function index()
    {
        $question = Question::all();

        return view('questions.index', compact('question'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        //$data = $request->all(); 

        Question::create($request->all());

        return redirect('/');
    }

    public function show()
    {
        /*return Datatables::of(Question::all())
            ->addColumn('qtitle', function($model){
                return $model->qtitle;
            })
            ->addColumn('answer', function($model){
                return $model->answer;
            })
            ->searchColumns('qtitle', 'answer')
            ->orderColumns('qtitle', 'answer')
            ->make(true);*/
        $questions = Question::all();

        return view('questions.show', compact('questions'));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question'));
    }

    public function update($id, Request $request)
    {
        $question = Question::findOrFail($id);
        

        $question->update($request->all());

        return redirect('/questions/show');
    } 

    public function uploadResult(Request $request)
    {
        $data = $request->all();

        $questionResult = $data['question'];
        $result = explode(',', $questionResult);

        for ($i = 0; $i < count($result); $i++) {
            $saveResult = explode('-', $result[$i]);
            Result::create([
                'user_id' => $data['user_id'],
                'question_id' => $saveResult[0],
                'answer' => $saveResult[1],
                'second' => $saveResult[2]
            ]);

            if ($saveResult[3] == '1') {
                $FavoriteRecord = Favorite::where('user_id', $data['user_id'])->where('question_id', $saveResult[0])->first();
                if ($FavoriteRecord == null || $FavoriteRecord == 'null') {
                    Favorite::create([
                    'user_id' => $data['user_id'],
                    'question_id' => $saveResult[0]
                    ]); 
                }  
            } else if ($saveResult[3] == '0'){
                Favorite::where('user_id', $data['user_id'])->where('question_id', $saveResult[0])->delete();
            }
        }

        $UserRecord = UserRecord::where('user_id',  $data['user_id'])->get();
        $StageRecord = $UserRecord->where('stages_id', $data['stages_id'])->first();

        $CrementRecord = UserRecord::where('user_id', $data['user_id'])
                                ->where('stages_id', $data['stages_id'])
                                ->max('stage_score');
        $Crement = $data['score'] - $CrementRecord;

        $User = User::where('id', $data['user_id'])->first();
        if (count($UserRecord) == 0 || $StageRecord == 'null' || $StageRecord == null) {
            $User->increment('score', $data['score']);
        } else if ($Crement > 0) {
            $User->increment('score', $Crement); 
        }

        $UserSrcoreRecord = Score::where('user_id', $data['user_id'])
                                ->where('category_id', floor($data['stages_id']/100));
        if (count($UserSrcoreRecord->get()) == 0) {
            Score::create([
                'user_id' => $data['user_id'],
                'user_name' => $User['name'],
                'category_id' => floor($data['stages_id']/100),
                'score' => $data['score']
            ]);
        } else if ($Crement > 0) {
            $UserSrcoreRecord->first()->increment('score', $Crement);
        }

        UserRecord::create([
            'user_id' => $data['user_id'],
            'stages_id' => $data['stages_id'],
            'accuracy' => $data['accuracy'],
            'accuracy_detail' => $data['accuracy_detail'],
            'status' => $data['status'],
            'status_detail' => $data['status_detail'],
            'stage_score' => $data['score']
        ]);

        return response()->json(['RetCode' => '1']);
    }

    public function showResult()
    {
        $result = UserRecord::where('stages_id', 102)->get();

        $resultData = [];
        $resultData['count'] = count(UserRecord::where('stages_id', 102)->get());

        $user_id = User::where('email', 'a8212270@yahoo.com.tw')->first();

        return $user_id['id'];
    }
}
