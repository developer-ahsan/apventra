<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\ResetPassword;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	$user = User::where('email',$request->email)->first();
    	if($user) {
    		if($user->password == $request->password) {
	    		return response()->json(['Error'=>false, 'msg'=>'Logged In Successfully..','user'=>$user]);
    		} else {
	    		return response()->json(['Error'=>true, 'msg'=>'Password is not matched..']);
    		}
    	} else {
    		return response()->json(['Error'=>true, 'msg'=>'Email doesn`t exist..']);
    	}

    }
    public function forgetPassword(Request $request)
    {
    	$user = User::where('email',$request->email)->first();
        if ($user) {
            \Mail::to($request->email)->send(new ResetPassword($user));
            return response()->json(['err'=>0]);
        } else {
            return response()->json(['err'=>1,'msg'=>'Email not found']);
        } 

    }
    public function resetPassword(Request $request)
    {
    	$user = User::where('id',$request->id)->first();
        if ($user) {
            $user->password = $request->password;
            $user->save();
            return response()->json(['err'=>0,'msg'=>'Password Updated']);
        } else {
            return response()->json(['err'=>1,'msg'=>'User not found']);
        } 

    }
}
