@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Users</h1>
            <p class="text-muted mb-0">Manage the administrators who can access the dashboard.</p>
        </div>
        <button type="button" class="btn btn-warning fw-semibold" data-bs-toggle="modal" data-bs-target="#addAdminModal">
            <i class="bi bi-person-plus me-1"></i>
            Add Administrator
        </button>
    </div>

    <form method="GET" action="{{ route('admin.users') }}" class="mb-4">
        <div class="input-group" style="max-width: 520px;">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input type="search" name="search" class="form-control" value="{{ $search }}" placeholder="Search by name or email" aria-label="Search administrators">
            <button type="submit" class="btn btn-outline-primary">Search</button>
            @if($search !== '')
                <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary">Clear</a>
            @endif
        </div>
    </form>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Administrator</th>
                            <th>Access</th>
                            <th>Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle bg-light text-primary d-flex align-items-center justify-content-center fw-semibold" style="width: 42px; height: 42px;">
                                            {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold">
                                                {{ $user->name }}
                                                @if(auth()->id() === $user->id)
                                                    <span class="badge text-bg-light ms-1">You</span>
                                                @endif
                                            </div>
                                            <small class="text-muted">{{ $user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge text-bg-success">Dashboard Admin</span></td>
                                <td>{{ $user->created_at->format('M j, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">No administrators found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">{{ $users->links() }}</div>
</div>

<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add Dashboard Administrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="adminName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="adminName" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="adminEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="adminEmail" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="adminPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="adminPassword" name="password" minlength="8" required>
                        <small class="text-muted">Use at least 8 characters.</small>
                    </div>
                    <div>
                        <label for="adminPasswordConfirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="adminPasswordConfirmation" name="password_confirmation" minlength="8" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning fw-semibold">Add Administrator</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->any())
    @push('scripts')
        <script>
            new bootstrap.Modal(document.getElementById('addAdminModal')).show();
        </script>
    @endpush
@endif
@endsection
