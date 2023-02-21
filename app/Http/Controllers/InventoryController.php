<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

class InventoryController extends Controller
{
    public function index(Request $request, Builder $builder): string|JsonResponse
    {
        if (request()->ajax()) {
            try {
                $inventoryQuery = Inventory::query()
                    ->select(
                        'inventory.*',
                        DB::raw("ROUND(inventory.sale_price_cents / 100, 2) as price"),
                        DB::raw("ROUND(inventory.cost_cents / 100, 2) as cost"),
                        'products.product_name as name'
                    )
                    ->join('products', 'inventory.product_id', '=', 'products.id')
                    ->join('users', 'products.admin_id', '=', 'users.id')
                    ->where('users.email', '=', $request->session()->get('email'))
                    ->where('users.is_enabled', '=', true)
                ;

                return DataTables::of($inventoryQuery)
                    ->filter(function ($query) {
                        $searchTerm = (request()->get('search') ?? ['value' => null])['value'];

                        if (!is_null($searchTerm)) {
                            $query->where('inventory.product_id', 'ilike', "%" . $searchTerm . "%");
                            $query->orWhere('inventory.sku', 'ilike', "%" . $searchTerm . "%");
                        }
                    })->toJson();
            } catch (Throwable $e) {
                // @todo: add error logging
                return new JsonResponse(['error' => $e->getMessage()], 400);
            }
        }

        $html = $builder->columns([
            Column::make('name'),
            Column::make('sku'),
            Column::make('quantity'),
            Column::make('color'),
            Column::make('size'),
            Column::make('price'),
            Column::make('cost'),
        ]);

        return view('inventory.index', compact('html'));
    }
}
