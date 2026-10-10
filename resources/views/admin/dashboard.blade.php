@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">Dashboard</h1>

            <p class="text-muted mb-0">
                Welcome back!
            </p>
        </div>

    </div>


    {{-- Statistics --}}
    <div class="row g-4">

        {{-- Products --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Products
                            </p>

                            <h3 class="mb-0">
                                120
                            </h3>
                        </div>

                        <div class="text-primary fs-2">
                            <i class="bi bi-box-seam"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Orders --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Inquiries
                            </p>

                            <h3 class="mb-0">
                                35
                            </h3>
                        </div>

                        <div class="text-success fs-2">
                            <i class="bi bi-envelope"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Users --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Users
                            </p>

                            <h3 class="mb-0">
                                18
                            </h3>
                        </div>

                        <div class="text-info fs-2">
                            <i class="bi bi-people"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Revenue --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Revenue
                            </p>

                            <h3 class="mb-0">
                                ₱125,000
                            </h3>
                        </div>

                        <div class="text-warning fs-2">
                            <i class="bi bi-cash-stack"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



</div>

@endsection
