<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        //dd($request->all());
        $user = User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]
            );

            auth()->login($user);
            return redirect('/')->with('success','Account created successfully!');
    }
}

?>
