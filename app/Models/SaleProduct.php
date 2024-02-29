<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleProduct extends Model
{
    protected $fillable = ['product_id','amount'];
    public $timestamps = false;    
    
    public function sales(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
