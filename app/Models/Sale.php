<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['amount'];
    public $timestamps = false;    
    
    public function saleProduct(): BelongsTo
    {
        return $this->belongsTo(SaleProduct::class);
    }
}
