<?php

namespace App\SqlProducts;

use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class SqlProductService
{
    public function getPropertyValuesByProductId($product_id): array
    {
        $values = [];
        $propertyValues = Product::findOrFail($product_id)->properties()->get();
        foreach ($propertyValues as $value) {
            $values[] = $value->name;
        }
        return $values;
    }

    public function getUniqueProductsPropertyByCategory($category_name): array
    {
        // getting the products id by the passed category name (or through relation?)
        $products = Category::join('products', 'categories.id', 'products.category_id')
            ->select('products.id')
            ->where('categories.name', '=', $category_name)
            ->get()->toArray();
        //gets the properties that don't repeat in given products
        return Property::whereHas('products', function ($q) use ($products){
            $q->whereIn('product_id', $products)
                ->select('property_id')
                ->groupBy('property_id')
                ->having(DB::raw('count(property_id)'), '=', 1);
        })->get()->toArray();
    }
}
