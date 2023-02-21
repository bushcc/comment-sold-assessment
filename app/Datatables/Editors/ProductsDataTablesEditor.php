<?php

namespace App\Datatables\Editors;

use App\Models\Product;
use Yajra\DataTables\DataTablesEditor;

class ProductsDataTablesEditor extends DataTablesEditor
{
    protected $model = Product::class;
}
