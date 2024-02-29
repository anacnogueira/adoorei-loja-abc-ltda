<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['amount'];
    public $timestamps = false;    
    
    public function saleProduct(): HasMany
    {
        return $this->hasMany(SaleProduct::class);
    }
}
