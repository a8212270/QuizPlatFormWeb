<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MobileController extends Controller
{

    /**
     *
     *
     * @param  $request
     * @return Response
     */
    public function postLogin(Request $request)
    {
        $loginData = $request->all();

        $rules = [
            'email'=>'required|email',
            'password'=>'required'
        ];

        $user_id = User::where('email', $loginData['email'])->first();

        $validator = Validator::make($loginData, $rules);

        if ($validator->passes()) {
            $attempt = Auth::attempt([
                'email' => $loginData['email'],
                'password' => $loginData['password']
            ]);

            // if ($attempt && $loginData['login_way'] == 'web') {
            //     return redirect('/');
            // } else 

            if ($attempt) {
                return response()->json(['result' => '1', 'detail' => 'Successful', 'user_id' => $user_id['id'], 'user_name' => $user_id['name']]);
            }
            

            

            return response()->json(['result' => '0', 'detail' => 'Email or password get Wrong!']);
        }
        return response()->json(['result' => '0', 'detail' => $validator]);
    }

    /**
     * 
     *
     * @param  $username, $email, $password
     * @return Response
     */
    public function postRegister(Request $request)
    {
        $registerData = $request->all();
        
        /*if (!isset($data['name']) {
            return response()->json(['result' => '0', 'detail' => 'Register Fail!']);
        }*/

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ];


        $validator = Validator::make($registerData, $rules);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'detail' => 'Register Fail!']);
        }

        User::create([
                'name' => $registerData['name'],
                'email' => $registerData['email'],
                'password' => bcrypt($registerData['password']),
                'company_id' => $registerData['company_id'],
            ]);
        return response()->json(['result' => '1', 'detail' => 'Register Successful!']);
    }
}
