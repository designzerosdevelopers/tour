<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Metadata;
use App\Models\PostImage;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =   Post::orderBy('created_at', 'desc')->paginate(10);

        return view('adminpanel.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpanel.post.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'meta_title' => 'nullable',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
                'title' => 'required|string',
                'tags' => 'nullable|string',
                'content' => 'required|string',
                'published' => 'boolean',
                'category_id' => 'required',
                'question.*' => 'nullable|string|max:2000',
                'answer.*' => 'nullable|string|max:5000',
            ],
            [
                'category_id.required' => 'Please select a category.',
            ]
        );


        $qna = [];
        foreach ($validatedData['question'] as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $validatedData['answer'][$index] ?? ''
            ];
        }

        $validatedData['user_id'] = 0;
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        $validatedData['qna'] = json_encode($qna);

        $post = Post::create($validatedData);
        if ($request->images) {
            foreach ($request->images as $imageID) {
                PostImage::create([
                    'post_id' => $post->id,
                    'image_id' => $imageID,
                ]);
            }
        }

        $validatedData['model_type'] = 'App\Models\Post';
        $validatedData['model_id'] = $post->id;
        Metadata::create($validatedData);
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }


    public function edit(string $id)
    {
        $post = Post::with('images')->find($id);

        if (!$post) {
            return abort(404, 'Post not found');
        }
        $post->qna = json_decode($post->qna);

        $meta = Metadata::where('model_type', 'App\Models\Post')->where('model_id', $id)->first();

        return view('adminpanel.post.edit', ['post' => $post, 'meta' => $meta, 'categories' => Category::all()]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate(
            [
                'meta_title' => 'nullable',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
                'title' => 'required|string',
                'tags' => 'nullable|string',
                'content' => 'required|string',
                'published' => 'boolean',
                'category_id' => 'required',
                'question.*' => 'nullable|string|max:2000',
                'answer.*' => 'nullable|string|max:5000',
            ],
            [
                'category_id.required' => 'Please select a category.',
            ]
        );


        $post = Post::findOrFail($id);

        if ($request->images) {
            foreach ($request->images as $imageID) {
                PostImage::create([
                    'post_id' => $id,
                    'image_id' => $imageID,
                ]);
            }
        }

        $qna = [];
        foreach ($validatedData['question'] as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $validatedData['answer'][$index] ?? ''
            ];
        }
        $validatedData['qna'] = json_encode($qna);

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $post->update($validatedData);
        Metadata::where('model_type', 'App\Models\Post')->where('model_id', $id)->update([
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        return redirect()->route('post.index')->with('success', 'Post saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $model_type = 'App\Models\Post';
        $post = Post::find($id);
        if (!$post) {
            return false;
        }

        Metadata::where('model_type', $model_type)->where('model_id', $id)->delete();

        $Images = PostImage::where('post_id', $id)->get();
        foreach ($Images as $Image) {
            $Image->delete();
        }

        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }

    public function deleteImage($post_id, $image_id)
    {
        $image = PostImage::where('image_id', $image_id)
            ->where('post_id', $post_id)
            ->firstOrFail();

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
