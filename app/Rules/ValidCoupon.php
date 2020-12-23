<?php

namespace App\Rules;

use App\Models\Coupon;
use Illuminate\Contracts\Validation\Rule;

class ValidCoupon implements Rule
{
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->coupon = Coupon::where('code', $value)->first();

        if (!$this->coupon) {
            return $this->fail('Coupon not found.');
        }

        if ($this->coupon->hasExpired()) {
            return $this->fail('Coupon has expired.');
        }

        return true;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getModel()
    {
        return $this->coupon;
    }

    /**
     * Undocumented function
     *
     * @param [type] $message
     * @return void
     */
    public function fail($message)
    {
        $this->message = $message;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return stringn
     */
    public function message()
    {
        return $this->message;
    }
}
