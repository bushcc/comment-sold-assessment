<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'product_name',
        'description',
        'style',
        'brand',
        'created_at',
        'updated_at',
        'url',
        'product_type',
        'shipping_price',
        'note',
        'admin_id',
    ];
}
