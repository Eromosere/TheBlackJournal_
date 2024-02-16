<?php

namespace App\Http\Controllers\Dashboard\Post;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = 'create';

        $categories = Category::all();

        return view('dashboard.post.create', compact('action','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'published_at' => 'required|date',
                'status' => 'required',
                'category_id' => 'required|exists:categories,id',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $validatedData = $validator->validated();

            $imagePath = $request->file('image')->store('posts', 'public');
            if (!$imagePath) {
                throw new \Exception('Failed to upload the image.');
            }
            $validatedData['image'] = $imagePath;

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['slug'] = strtolower(preg_replace('/\s+/', '-', $validatedData['title']));
            // Create a new post with the validated data
            $post = Post::create($validatedData);

            return redirect()->route('post.index')->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('comments')->find($id);

        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $action = 'edit';

        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.post.create', compact('action','post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'published_at' => 'required|date',
                'status' => 'required',
                'category_id' => 'required|exists:categories,id',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $validatedData = $validator->validated();

            // Retrieve the existing post
            $post = Post::findOrFail($id);

            // Check if a new image file has been uploaded
            if ($request->hasFile('image')) {
                // Delete the old image file
                Storage::disk('public')->delete($post->image);

                // Store the new image file
                $imagePath = $request->file('image')->store('posts', 'public');
                if (!$imagePath) {
                    throw new \Exception('Failed to upload the image.');
                }
                $validatedData['image'] = $imagePath;
            }

            // Update the post with the validated data
            $post->update($validatedData);

            return redirect()->route('post.index')->with('success', 'Post updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return back()->with('success', 'Post deleted successfully!');
    }

    public function deletePostComment($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }
}
