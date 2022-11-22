<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SqlProducts\SqlProductService;

class ProductController extends Controller
{
    private SqlProductService $sqlProductService;

    public function __construct()
    {
        $this->sqlProductService = new SqlProductService();
    }
    public function getPropertyValues(Request $request): array
    {
        $product_id = $request->route('product_id');
        return $this->sqlProductService->getPropertyValuesByProductId($product_id);
    }

    public function getUniqueProductsPropertyByCategory(Request $request):array
    {
        $category_name = $request->route('category_name');
       return $this->sqlProductService->getUniqueProductsPropertyByCategory($category_name);
    }
}
