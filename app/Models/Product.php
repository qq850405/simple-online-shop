<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'status',
        'inventory',
        'seller_id',
        'price'
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function scopeCanShow($query)
    {
        return $query->where('status', '=', 'open')
            ->where('deleted_at', '=', null);
    }

    public function deductInventory($product_id, $quantity)
    {
        return $this->query()->find($product_id)->decrement('inventory', $quantity);
    }
}
