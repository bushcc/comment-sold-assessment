<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

class ProductsController extends Controller
{
    public function index(Request $request, Builder $builder): string|JsonResponse
    {
        if (request()->ajax()) {
            try {
                $productQuery = Product::query()
                    ->select(
                        "products.*",
                        "inventory.quantity as quantity"
                    )
                    ->join('users', 'products.admin_id', '=', 'users.id')
                    ->join('inventory', 'products.id', '=', 'inventory.product_id')
                    ->where('users.email', '=', $request->session()->get('email'))
                    ->where('users.is_enabled', '=', true)
                ;

                return DataTables::of($productQuery)
                    ->filter(function ($query) {
                        $searchTerm = (request()->get('search') ?? ['value' => null])['value'];

                        if (!is_null($searchTerm)) {
                            $query->where('products.product_name', 'ilike', "%" . $searchTerm . "%");
                            $query->orWhere('products.style', 'ilike', "%" . $searchTerm . "%");
                            $query->orWhere('products.brand', 'ilike', "%" . $searchTerm . "%");
                        }
                    })->toJson();
            } catch (Throwable $e) {
                // @todo: add error logging
                return new JsonResponse(['error' => $e->getMessage()], 400);
            }
        }

        $html = $builder->columns([
            Column::make('product_name'),
            Column::make('style'),
            Column::make('brand'),
            Column::make('quantity'),
        ]);

        return view('products.index', compact('html'));
    }

    /**
     * @todo: skipping for time - all of the required fields must be handled for this to work
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_name' => 'required',
            'style' => 'required',
            'brand' => 'required'
        ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->style = $request->style;
        $product->brand = $request->brand;
        $product->save();

        return redirect()->route('companies.index')
            ->with('success', 'Product has been added.');
    }
}
