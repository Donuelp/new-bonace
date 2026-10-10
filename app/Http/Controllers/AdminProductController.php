<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search'));
        $category = trim((string) $request->query('category'));

        $products = Product::with('images')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($category !== '', function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.admin-products', compact('products', 'search', 'category'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:4096'],
            'new_main_image_index' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['new_main_image_index']);

        $product = Product::create($data);
        $newImages = $this->storeImages($request, $product);
        $this->setMainImage($product, $request, $newImages);

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:4096'],
            'main_image_id' => ['nullable', 'integer'],
            'new_main_image_index' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['main_image_id'], $data['new_main_image_index']);

        $product->update($data);
        $newImages = $this->storeImages($request, $product);
        $this->setMainImage($product, $request, $newImages);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

    private function storeImages(Request $request, Product $product)
    {
        if (!$request->hasFile('images')) {
            return collect();
        }

        $images = collect();

        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('products', 'public');

            $images->push($product->images()->create([
                'path' => $path,
                'original_name' => $image->getClientOriginalName(),
                'sort_order' => $product->images()->count() + $index,
            ]));
        }

        return $images;
    }

    private function setMainImage(Product $product, Request $request, $newImages): void
    {
        $newMainImage = $newImages->get($request->integer('new_main_image_index'));

        if ($newMainImage) {
            $product->update(['main_image_id' => $newMainImage->id]);
            return;
        }

        $selectedImageId = $request->integer('main_image_id');

        if ($selectedImageId && $product->images()->whereKey($selectedImageId)->exists()) {
            $product->update(['main_image_id' => $selectedImageId]);
            return;
        }

        if (!$product->main_image_id && $newImages->isNotEmpty()) {
            $product->update(['main_image_id' => $newImages->first()->id]);
        }
    }
}
