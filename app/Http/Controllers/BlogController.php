<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->subtitle = $request->subtitle;
            $blog->content = $request->content;
            $blog->slug = Str::slug($request->title, '-');

            $slug = $blog->slug;
            $counter = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $blog->slug . '-' . $counter;
                $counter++;
            }

            $blog->slug = $slug;

            if ($request->hasFile('image_path')) {

                $file = $request->file('image_path');
                // store image in folder and return image path
                $blog->image_path = mmadev_store_and_get_image_path('blogs', $file);
            }

            $blog->save();

            return redirect()->route('blogs')->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('blog.create')->with('error', 'Error creating blog: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $blog = Blog::find($id);
            return view('pages.blogs.edit', compact('blog'));
        } catch (\Exception $e) {
            return redirect()->route('blogs')->with('error', 'Error editing blog: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->content = $request->content;
        $blog->slug = Str::slug($request->title, '-');

        $slug = $blog->slug;
        $counter = 1;

        while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $blog->slug . '-' . $counter;
            $counter++;
        }

        $blog->slug = $slug;

        // Handle image upload (if a new image is provided)
        if ($request->hasFile('image_path')) {
            // Delete old image if it exists
            if (!empty($blog->image_path)) {
                mmadev_delete_attachment_from_directory($blog->image_path, 'blogs');
            }

            $file = $request->file('image_path');
            // store image in folder and return image path
            $blog->image_path = mmadev_store_and_get_image_path('blogs', $file);
        }

        $blog->save();

        return redirect()->route('blogs')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);

            // Delete image from directory if it exists
            if (!empty($blog->image_path)) {
                mmadev_delete_attachment_from_directory($blog->image_path, 'blogs');
            }

            $blog->delete();

            return redirect()->route('blogs')->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('blogs')->with('error', 'Error deleting blog: ' . $e->getMessage());
        }
    }

    public function remove_image(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);

            // Remove the image_path from the Blog model and Delete image from directory if it exists
            if (!empty($blog->image_path)) {
                mmadev_delete_attachment_from_directory($blog->image_path, 'blogs');
                $blog->image_path = null;
            }

            $blog->save();

            // Return a success response
            return response()->json(['message' => 'Image removed successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error removing image'], 500);
        }
    }
}