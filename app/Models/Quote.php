<?php

namespace App\Models;

use App\Models\InsuranceProduct;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'user_id',
        'insurance_product_id',
        'estimated_premium',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(InsuranceProduct::class, 'insurance_product_id');
    }

    public function policy()
    {
        return $this->hasOne(Policy::class);
    }
}
