
{{-- SIDEBAR --}}
@auth

    <aside class="col-md-3 col-lg-2 d-md-block bg-white border-end min-vh-100 px-0">

        <div class="p-3">

            {{-- MAIN MENU --}}
            <small class="text-muted fw-bold text-uppercase">
                Main Menu
            </small>

            <ul class="nav flex-column mt-2">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('dashboard') ? 'active' : 'text-dark' }}"
                        href="{{ url('/dashboard') }}">

                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard

                    </a>
                </li>


                {{-- Products --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('admin-products*') ? 'active' : 'text-dark' }}"
                        href="{{ url('/admin-products') }}">

                        <i class="bi bi-box-seam me-2"></i>
                        Products

                    </a>
                </li>


                {{-- Categories --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('categories*') ? 'active' : 'text-dark' }}"
                        href="{{ url('/categories') }}">

                        <i class="bi bi-grid me-2"></i>
                        Categories

                    </a>
                </li>


                {{-- Journal --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('journal*') ? 'active' : 'text-dark' }}"
                        href="{{ url('/journal') }}">

                        <i class="bi bi-journal-text me-2"></i>
                        Journal

                    </a>
                </li>


                {{-- Social Media --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('social-media*') ? 'active' : 'text-dark' }}"
                        href="{{ url('/social-media') }}">

                        <i class="bi bi-share me-2"></i>
                        Social Media

                    </a>
                </li>


                {{-- Users --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('users*') ? 'active' : 'text-dark' }}"
                        href="{{ url('/users') }}">

                        <i class="bi bi-people me-2"></i>
                        Users

                    </a>
                </li>

            </ul>


            {{-- SETTINGS --}}
            <small class="text-muted fw-bold text-uppercase d-block mt-4">
                Settings
            </small>

            <ul class="nav flex-column mt-2">

                {{-- General Settings --}}
                <li class="nav-item">
                    <a
                        class="nav-link rounded {{ request()->is('settings*') ? 'active' : 'text-dark' }}"
                        href="{{ url('/settings') }}">

                        <i class="bi bi-gear me-2"></i>
                        General Settings

                    </a>
                </li>

            </ul>

        </div>

    </aside>

@endauth
