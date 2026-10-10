<?php

namespace App\Http\Controllers\OldDesign;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CustomerCategoryController extends Controller
{
    public function components()
    {
        return $this->showCategory('Components', 'components');
    }

    public function necklaces()
    {
        return $this->showCategory('Necklaces', 'necklaces');
    }

    public function clutches()
    {
        return $this->showCategory('Clutches', 'clutches');
    }

    public function bangles()
    {
        return $this->showCategory('Bangles', 'bangles');
    }

    public function earrings()
    {
        return $this->showCategory('Earrings', 'earrings');
    }

    public function shoes()
    {
        return $this->showCategory('Shoes', 'shoes');
    }

    public function beadedBags()
    {
        return $this->showCategory('Beaded Bags', 'beaded-bags');
    }

    public function product(Product $product)
    {
        abort_unless($product->is_active, 404);

        $product->load(['mainImage', 'images']);

        return view('old_design.product-detail', compact('product'));
    }

    private function showCategory(string $category, string $view)
    {
        $products = Product::query()
            ->with(['mainImage', 'images'])
            ->where('is_active', true)
            ->where('category', $category)
            ->latest()
            ->get();

        return view("old_design.{$view}", compact('products'));
    }
}
