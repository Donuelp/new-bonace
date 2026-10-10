@php
    $editingPost = $post ?? null;
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $editingPost?->title) }}" required>
    </div>
    <div class="col-12">
        <label class="form-label">Short Summary</label>
        <textarea name="excerpt" class="form-control" rows="2" maxlength="500" placeholder="A short introduction shown in the post list.">{{ old('excerpt', $editingPost?->excerpt) }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Post Content</label>
        <textarea name="content" class="form-control" rows="10" required placeholder="Write your company update or blog post here.">{{ old('content', $editingPost?->content) }}</textarea>
    </div>
    @if($editingPost?->images->isNotEmpty())
        <div class="col-12">
            <label class="form-label d-block">Current Main Image</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach($editingPost->images as $image)
                    <label class="position-relative border rounded p-1 bg-white" style="cursor: pointer; width: 108px;">
                        <input class="form-check-input position-absolute top-0 start-0 m-2" type="radio" name="main_image_id" value="{{ $image->id }}" data-journal-existing-main {{ $editingPost->main_image_id === $image->id ? 'checked' : '' }}>
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->original_name ?? $editingPost->title }}" class="rounded w-100" style="height: 82px; object-fit: cover;">
                        <small class="d-block text-center mt-1 text-truncate">{{ $editingPost->main_image_id === $image->id ? 'Main image' : 'Set as main' }}</small>
                    </label>
                @endforeach
            </div>
        </div>
    @endif
    <div class="col-12">
        <label class="form-label">Post Images</label>
        <input type="file" name="images[]" class="form-control" accept="image/*" multiple data-journal-image-input data-preview-target="journalImagePreview{{ $editingPost?->id ?? 'New' }}" {{ !$editingPost ? 'data-default-main=true' : '' }}>
        <small class="text-muted">Select multiple images, then choose the image to use as the main post image.</small>
        <div id="journalImagePreview{{ $editingPost?->id ?? 'New' }}" class="d-flex flex-wrap gap-3 mt-3"></div>
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="is_published" value="1" id="isPublished{{ $editingPost?->id ?? 'New' }}" {{ old('is_published', $editingPost?->is_published ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="isPublished{{ $editingPost?->id ?? 'New' }}">Publish this post</label>
        </div>
        <small class="text-muted">Turn this off to save the post as a draft.</small>
    </div>
</div>
