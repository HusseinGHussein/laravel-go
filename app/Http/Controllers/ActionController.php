<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
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
    public function __invoke(StoreCouponRequest $request)
    {
        $coupon = $request->getCouponModel();
    }
}
