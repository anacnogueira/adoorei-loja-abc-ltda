<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['amount'];
    public $timestamps = false;    
    
    public function saleProduct(): HasMany
    {
        return $this->hasMany(SaleProduct::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'sale_products')->withPivot('amount');
    }

    public function delete()
    {
        $this->saleProduct()->delete();
        return parent::delete();
    }
}
