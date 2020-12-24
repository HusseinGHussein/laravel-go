<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use App\Rules\ValidCoupon;
use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coupon' => [
                'required',
                new ValidCoupon($this->getCouponModel())
            ]
        ];
    }

    public function getCouponModel()
    {
        return  Coupon::where('code', $this->coupon)->first();
    }
}
