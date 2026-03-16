<?php

namespace App\Models;

use App\Models\InsuranceProduct;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'user_id',
        'quote_id',
        'insurance_product_id',
        'policy_number',
        'effective_date'
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function quote()
        {
            return $this->belongsTo(Quote::class);
        }

        public function product()
        {
            return $this->belongsTo(InsuranceProduct::class, 'insurance_product_id');
        }
}
