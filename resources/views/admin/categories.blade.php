@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Categories</h1>
            <p class="text-muted mb-0">Organize your products into clear, easy-to-browse collections.</p>
        </div>
        <button type="button" class="btn btn-primary" disabled title="Category creation will be available soon">
            <i class="bi bi-plus-lg me-2"></i>Add Category
        </button>
    </div>

    <div class="row g-4">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-xl-4">
                <a href="{{ route('admin.products', ['category' => $category['name']]) }}" class="text-decoration-none text-dark d-block h-100">
                    <div class="card border-0 shadow-sm h-100 category-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="rounded-3 bg-light text-primary d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <i class="bi {{ $category['icon'] }} fs-4"></i>
                                </div>
                                <span class="badge rounded-pill text-bg-light">View products <i class="bi bi-arrow-right ms-1"></i></span>
                            </div>
                            <h2 class="h5 mb-2">{{ $category['name'] }}</h2>
                            <p class="text-muted small mb-0">{{ $category['description'] }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
