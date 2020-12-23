<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user;

        $this->validate($request, [
            'password' => [
                'required',
                function ($attributes, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Current password is incorrect');
                    }
                }
            ]
        ]);
    }
}
