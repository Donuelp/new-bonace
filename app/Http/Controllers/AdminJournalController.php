<?php

namespace App\Http\Controllers;

use App\Models\JournalPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJournalController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search'));

        $posts = JournalPost::with(['images', 'mainImage'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.journal', compact('posts', 'search'));
    }

    public function store(Request $request)
    {
        $post = JournalPost::create($this->validatedData($request));
        $newImages = $this->storeImages($request, $post);
        $this->setMainImage($post, $request, $newImages);

        return redirect()->route('admin.journal')->with('success', 'Journal post created successfully.');
    }

    public function update(Request $request, JournalPost $journalPost)
    {
        $journalPost->update($this->validatedData($request, $journalPost));
        $newImages = $this->storeImages($request, $journalPost);
        $this->setMainImage($journalPost, $request, $newImages);

        return redirect()->route('admin.journal')->with('success', 'Journal post updated successfully.');
    }

    public function destroy(JournalPost $journalPost)
    {
        foreach ($journalPost->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $journalPost->delete();

        return redirect()->route('admin.journal')->with('success', 'Journal post deleted successfully.');
    }

    private function validatedData(Request $request, ?JournalPost $post = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'is_published' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:4096'],
            'main_image_id' => ['nullable', 'integer'],
            'new_main_image_index' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_published'] = $request->boolean('is_published');
        unset($data['main_image_id'], $data['new_main_image_index']);

        if ($data['is_published'] && (!$post || !$post->published_at)) {
            $data['published_at'] = now();
        }

        if (!$data['is_published']) {
            $data['published_at'] = null;
        }

        return $data;
    }

    private function storeImages(Request $request, JournalPost $post)
    {
        if (!$request->hasFile('images')) {
            return collect();
        }

        $images = collect();
        $sortOrder = $post->images()->count();

        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('journal', 'public');

            $images->push($post->images()->create([
                'path' => $path,
                'original_name' => $image->getClientOriginalName(),
                'sort_order' => $sortOrder + $index,
            ]));
        }

        return $images;
    }

    private function setMainImage(JournalPost $post, Request $request, $newImages): void
    {
        $newMainImage = $newImages->get($request->integer('new_main_image_index'));

        if ($newMainImage) {
            $post->update(['main_image_id' => $newMainImage->id]);
            return;
        }

        $selectedImageId = $request->integer('main_image_id');

        if ($selectedImageId && $post->images()->whereKey($selectedImageId)->exists()) {
            $post->update(['main_image_id' => $selectedImageId]);
            return;
        }

        if (!$post->main_image_id && $newImages->isNotEmpty()) {
            $post->update(['main_image_id' => $newImages->first()->id]);
        }
    }
}
