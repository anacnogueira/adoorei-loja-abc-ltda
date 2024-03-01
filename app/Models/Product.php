<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // public function SaleProduct(): BelongsTo
    // {
    //     return $this->belongsTo(SaleProduct::class);
    // }


    // public function sales()
    // {
    //     return $this->belongsToMany(Sale::class,'sale_products');
    // }

    protected $fillable = ['name', 'description', 'price'];

    protected $hidden = ['pivot'];
}
