@extends('layouts.app')

@section('title', 'Products')

@section('content')
@php
    $categoryOptions = ['Components', 'Necklaces', 'Clutches', 'Bangles', 'Earrings', 'Shoes', 'Beaded Bags', 'Home Décor', 'Accent Furniture', 'Lighting'];
@endphp
<div class="py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Products</h1>
            <p class="text-muted mb-0">Add and manage product entries with multiple images.</p>
        </div>

        <button type="button" class="btn btn-warning fw-semibold" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-lg me-1"></i>
            Add Product
        </button>
    </div>

    <form method="GET" action="{{ route('admin.products') }}" class="mb-4">
        <div class="input-group" style="max-width: 520px;">
            @if($category !== '')
                <input type="hidden" name="category" value="{{ $category }}">
            @endif
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input
                type="search"
                name="search"
                class="form-control"
                value="{{ $search }}"
                placeholder="Search by name, category, SKU, or description"
                aria-label="Search products">
            <button type="submit" class="btn btn-outline-primary">Search</button>
            @if($search !== '' || $category !== '')
                <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary">Clear</a>
            @endif
        </div>
    </form>

    @if($category !== '')
        <div class="alert alert-info d-flex justify-content-between align-items-center py-2" role="alert">
            <span>Showing products in <strong>{{ $category }}</strong>.</span>
            <a href="{{ route('admin.products') }}" class="alert-link">View all products</a>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 90px;">Images</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        @forelse($product->images->take(3) as $image)
                                            <img
                                                src="{{ asset('storage/' . $image->path) }}"
                                                alt="{{ $image->original_name ?? $product->name }}"
                                                class="rounded border"
                                                style="width: 42px; height: 42px; object-fit: cover;">
                                        @empty
                                            <div class="rounded border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 42px; height: 42px;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endforelse
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $product->name }}</div>
                                    @if($product->description)
                                        <small class="text-muted">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</small>
                                    @endif
                                </td>
                                <td>{{ $product->category ?: '—' }}</td>
                                <td>{{ $product->sku ?: '—' }}</td>
                                <td>{{ $product->price !== null ? '₱' . number_format($product->price, 2) : '—' }}</td>
                                <td>
                                    <span class="badge {{ $product->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                        {{ $product->is_active ? 'Active' : 'Hidden' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editProductModal{{ $product->id }}"
                                            aria-label="Edit {{ $product->name }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" aria-label="Delete {{ $product->name }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    No products yet. Click <strong>Add Product</strong> to create one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>

@foreach($products as $product)
    <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow">
                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select name="is_active" class="form-select">
                                    <option value="1" {{ $product->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Hidden</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select">
                                    <option value="">Select category</option>
                                    @foreach($categoryOptions as $category)
                                        <option value="{{ $category }}" {{ $product->category === $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">SKU</label>
                                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" value="{{ $product->price }}" min="0" step="0.01">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>

                            @if($product->images->isNotEmpty())
                                <div class="col-12">
                                    <label class="form-label d-block">Current Main Image</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($product->images as $image)
                                            <label class="position-relative border rounded p-1 bg-white" style="cursor: pointer; width: 108px;">
                                                <input
                                                    class="form-check-input position-absolute top-0 start-0 m-2"
                                                    type="radio"
                                                    name="main_image_id"
                                                    value="{{ $image->id }}"
                                                    data-existing-main-image
                                                    {{ $product->main_image_id === $image->id ? 'checked' : '' }}>
                                                <img
                                                    src="{{ asset('storage/' . $image->path) }}"
                                                    alt="{{ $image->original_name ?? $product->name }}"
                                                    class="rounded w-100"
                                                    style="height: 82px; object-fit: cover;">
                                                <small class="d-block text-center mt-1 text-truncate">{{ $product->main_image_id === $image->id ? 'Main image' : 'Set as main' }}</small>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="col-12">
                                <label class="form-label">Add Product Images</label>
                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple data-image-input data-preview-target="editImagePreview{{ $product->id }}">
                                <small class="text-muted">New images are added to the existing product. Choose one below if a new image should become the main image.</small>
                                <div id="editImagePreview{{ $product->id }}" class="d-flex flex-wrap gap-3 mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Hidden</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select category</option>
                                @foreach($categoryOptions as $category)
                                    <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}" min="0" step="0.01">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Product Images</label>
                            <input type="file" name="images[]" class="form-control" accept="image/*" multiple data-image-input data-preview-target="addImagePreview" data-default-main="true">
                            <small class="text-muted">You can select multiple images. Max 4MB per image. Select the image to use as the main product image.</small>
                            <div id="addImagePreview" class="d-flex flex-wrap gap-3 mt-3"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning fw-semibold">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->any())
    @push('scripts')
        <script>
            const addProductModal = new bootstrap.Modal(document.getElementById('addProductModal'));
            addProductModal.show();
        </script>
    @endpush
@endif

@push('scripts')
    <script>
        document.querySelectorAll('[data-image-input]').forEach((input) => {
            input.addEventListener('change', () => {
                const preview = document.getElementById(input.dataset.previewTarget);
                preview.innerHTML = '';

                Array.from(input.files).forEach((file, index) => {
                    if (!file.type.startsWith('image/')) {
                        return;
                    }

                    const label = document.createElement('label');
                    label.className = 'position-relative border rounded p-1 bg-white';
                    label.style.cssText = 'cursor: pointer; width: 108px;';

                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'new_main_image_index';
                    radio.value = index;
                    radio.className = 'form-check-input position-absolute top-0 start-0 m-2';
                    radio.checked = input.dataset.defaultMain === 'true' && index === 0;

                    const image = document.createElement('img');
                    image.src = URL.createObjectURL(file);
                    image.alt = file.name;
                    image.className = 'rounded w-100';
                    image.style.cssText = 'height: 82px; object-fit: cover;';

                    const caption = document.createElement('small');
                    caption.className = 'd-block text-center mt-1 text-truncate';
                    caption.textContent = index === 0 && input.dataset.defaultMain === 'true' ? 'Main image' : 'Set as main';

                    label.append(radio, image, caption);
                    preview.append(label);
                });
            });
        });

        document.addEventListener('change', (event) => {
            if (event.target.matches('input[name="new_main_image_index"]')) {
                event.target.closest('.modal').querySelectorAll('[data-existing-main-image]').forEach((input) => input.checked = false);
            }

            if (event.target.matches('[data-existing-main-image]')) {
                event.target.closest('.modal').querySelectorAll('input[name="new_main_image_index"]').forEach((input) => input.checked = false);
            }
        });
    </script>
@endpush
@endsection
