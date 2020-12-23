<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function hasExpired()
    {
        if (is_null($this->ends_at)) {
            return false;
        }

        return $this->ends_at < now();
    }
}
