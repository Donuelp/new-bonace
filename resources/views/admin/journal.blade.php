@extends('layouts.app')

@section('title', 'Journal')

@section('content')
<div class="py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Journal</h1>
            <p class="text-muted mb-0">Create company updates, stories, and blog posts.</p>
        </div>
        <button type="button" class="btn btn-warning fw-semibold" data-bs-toggle="modal" data-bs-target="#addJournalPostModal">
            <i class="bi bi-plus-lg me-1"></i>
            New Post
        </button>
    </div>

    <form method="GET" action="{{ route('admin.journal') }}" class="mb-4">
        <div class="input-group" style="max-width: 520px;">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input
                type="search"
                name="search"
                class="form-control"
                value="{{ $search }}"
                placeholder="Search by title, summary, or content"
                aria-label="Search journal posts">
            <button type="submit" class="btn btn-outline-primary">Search</button>
            @if($search !== '')
                <a href="{{ route('admin.journal') }}" class="btn btn-outline-secondary">Clear</a>
            @endif
        </div>
    </form>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th>Last Updated</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        @if($post->mainImage)
                                            <img src="{{ asset('storage/' . $post->mainImage->path) }}" alt="{{ $post->title }}" class="rounded border" style="width: 54px; height: 54px; object-fit: cover;">
                                        @else
                                            <div class="rounded border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 54px; height: 54px;"><i class="bi bi-image"></i></div>
                                        @endif
                                        <div>
                                            <div class="fw-semibold">{{ $post->title }}</div>
                                            @if($post->excerpt)
                                                <small class="text-muted">{{ \Illuminate\Support\Str::limit($post->excerpt, 110) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $post->is_published ? 'text-bg-success' : 'text-bg-secondary' }}">
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </td>
                                <td>{{ $post->published_at ? $post->published_at->format('M j, Y') : '—' }}</td>
                                <td>{{ $post->updated_at->format('M j, Y') }}</td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editJournalPostModal{{ $post->id }}" aria-label="Edit {{ $post->title }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form method="POST" action="{{ route('admin.journal.destroy', $post) }}" onsubmit="return confirm('Delete this journal post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" aria-label="Delete {{ $post->title }}"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    No journal posts yet. Click <strong>New Post</strong> to publish your first update.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">{{ $posts->links() }}</div>
</div>

@foreach($posts as $post)
    <div class="modal fade" id="editJournalPostModal{{ $post->id }}" tabindex="-1" aria-labelledby="editJournalPostModalLabel{{ $post->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow">
                <form method="POST" action="{{ route('admin.journal.update', $post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJournalPostModalLabel{{ $post->id }}">Edit Journal Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.partials.journal-form', ['post' => $post])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="addJournalPostModal" tabindex="-1" aria-labelledby="addJournalPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <form method="POST" action="{{ route('admin.journal.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addJournalPostModalLabel">New Journal Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.partials.journal-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning fw-semibold">Save Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->any())
    @push('scripts')
        <script>
            new bootstrap.Modal(document.getElementById('addJournalPostModal')).show();
        </script>
    @endpush
@endif

@push('scripts')
    <script>
        document.querySelectorAll('[data-journal-image-input]').forEach((input) => {
            input.addEventListener('change', () => {
                const preview = document.getElementById(input.dataset.previewTarget);
                preview.innerHTML = '';

                Array.from(input.files).forEach((file, index) => {
                    if (!file.type.startsWith('image/')) return;

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
                    caption.textContent = radio.checked ? 'Main image' : 'Set as main';

                    label.append(radio, image, caption);
                    preview.append(label);
                });
            });
        });

        document.addEventListener('change', (event) => {
            if (event.target.matches('input[name="new_main_image_index"]')) {
                event.target.closest('.modal').querySelectorAll('[data-journal-existing-main]').forEach((input) => input.checked = false);
            }

            if (event.target.matches('[data-journal-existing-main]')) {
                event.target.closest('.modal').querySelectorAll('input[name="new_main_image_index"]').forEach((input) => input.checked = false);
            }
        });
    </script>
@endpush
@endsection
