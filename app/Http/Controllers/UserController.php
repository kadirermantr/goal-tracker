<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Replier;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return Replier::responseSuccess($user);
    }

    public function show($id)
    {
        $user = User::find($id);

        return Replier::responseSuccess($user);
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return $this->show($user->id);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->destroy($id);

            return Replier::responseSuccess([
                'message' => 'User deleted'
            ]);
        }

        return Replier::responseFalse([
            'message' => 'User not found'
        ]);
    }
}
