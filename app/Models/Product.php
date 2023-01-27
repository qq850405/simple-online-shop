<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'name',
        'description',
        'status',
        'inventory',
        'seller_id'
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function scopeCanShow($query)
    {
        return $query->where('status','=','open')
            ->where('deleted_at','=',null);
    }

}
