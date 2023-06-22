<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category',
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

    public function getProductCategory($seller_id){
        return $this
            ->query()
            ->where('seller_id',$seller_id)
            ->groupBy('category')
            ->pluck('category');
    }

    public function getProduct(){
        return $this->query()
            ->get();
    }


    public function getProductByPeriod(){
        $start = Carbon::now()->startOfDay()->addHours(10);
        $end = Carbon::now()->startOfDay()->addHours(14);

        // now>10 and now<14

        return $this->query()
            ->where('status','on')
            ->where('deleted_at',null)
            ->where('online_ordering','on')
//            ->whereBetween('period', [$start, $end])
            ->get();
    }

    public function getProductById($id){
        return $this->query()->find($id);
    }
}
