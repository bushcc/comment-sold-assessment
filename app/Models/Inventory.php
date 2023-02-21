<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Inventory extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'color',
        'size',
        'weight',
        'price_cents',
        'sale_price_cents',
        'cost_cents',
        'sku',
        'length',
        'width',
        'height',
        'note',
    ];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'inventory';

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false;
}
