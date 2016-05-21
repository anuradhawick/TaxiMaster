<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Hash;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function showViewPage(User $user){
        return view('viewaccount', compact('user'));
    }

    public function showEditPage(User $user){
        return view('editaccount', compact('user'));
    }

    public function deleteUser(Request $request){
        return json_encode(User::where('id', $request->id)->update(['isActive'=> false]));
    }

    public function updateUser(Request $request){
        $user = User::where('username', $request->username)->first();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $result = $user->save();
        
        if($result){
            return redirect('/accounts/view');
        }
        else{
            $errors = new MessageBag(['msg' => 'Username or password is incorrect']);
            return back()->withErrors($errors);
        }
    }
    
    public function createNewUser(Request $request){

        if(count(User::where('username', $request->username)->get())>0){
            $errors = new MessageBag(['msg' => 'Username already exists!']);
            return back()->withErrors($errors);
        }

        $user = new User;
        if($request->userType == 1){
            $user->userType = 'ADMIN';
        }
        else if($request->userType == 2){
            $user->userType = 'DRIVER';
        }
        else if($request->userType == 3){
            $user->userType = 'TAXI_OPERATOR';
        }

        $user->username = $request->username;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        try{
            $user->save();
        }
        catch (\Exception $e){
            $errors = new MessageBag(['msg' => 'Something went wrong. Please try again!']);
            return back()->withErrors($errors);
        }
        return redirect('/accounts/view');
    }
}