<?php

namespace App\Http\Controllers;

use App\Rules\ValidCoupon;
use Illuminate\Http\Request;

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
            'coupon' => [
                'required',
               $coupon = new ValidCoupon()
            ]
        ]);

        $coupon = $coupon->getModel();
    }
}
