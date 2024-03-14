<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthManager extends Controller
{
    /*function login() {
        return view("login");
    }

    function registration(){
        return view("registration");
    }

//     function loginPost(Request $request){
//         $request->validate([
//             "email"=> "required",
//             "password"=> "required"
//         ]);
//         //$credentials = $request->only("email","password");
//         if (!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
//         {
//             return redirect(route("login.post"))->with("error","login details are incorrect");
//         }
//         return redirect(route("home"));
// }
    function registrationPost(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required|email|unique:users",
            "name"=> "required"
            ]);

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            if(!$user){
                return redirect(route("registration"))->with("error","registration failed, try again");
            }
            return redirect(route("login"))->with("success","registration success");
            
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route("login"));
    }


    public function userpage(User $profile){   
        $id = Auth::user()->id;
        $user = User::find($id);
   
        return view('userpage',compact('user'));
    }

}*/