<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::whereNull('parent_category_id')->get();
        return view('pages.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'parent_category_id' => 'nullable|exists:categories,id',
        ]);

        try {

            $category = new Category();
            $category->name = $request->input('name');
            $category->slug = str_replace(' ', '-', strtolower($request->input('name')));
            $category->description = $request->input('description');
            $category->parent_category_id = $request->input('parent_category_id');
            $category->status = !empty($request->input('status')) ? 1 : 0;

            if ($request->hasFile('image_path')) {

                $file = $request->file('image_path');
                // store image in folder and return image path
                $category->image_path = mmadev_store_and_get_image_path('categories', $file);
            }

            $category->save();

            return redirect()->route('categories')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('category.create')->with('error', 'Error creating category: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // Get parent categories excluding the category itself and its descendants
        // $parentCategories = Category::where('id', '!=', $category->id)
        //     ->whereNotIn('id', $category->childCategories()->pluck('id')->toArray())
        //     ->get();

        // Check if the category has child categories
        if ($category->childCategories->isNotEmpty()) {
            // If the category has child categories, set $parentCategories to an empty array
            $parentCategories = [];
        } else {
            // If the category does not have child categories, fetch parent categories
            $parentCategories = Category::where('id', '!=', $category->id)->whereNull('parent_category_id')->get();
        }

        // echo "<pre>";
        // print_r($category->childCategories->pluck('id'));
        // exit;

        return view('pages.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($category->id),
            ],
            'description' => 'nullable|string',
            'parent_category_id' => [
                'nullable',
                'exists:categories,id',
                function ($attribute, $value, $fail) use ($category) {
                    if ($value == $category->id) {
                        $fail('A category cannot be a parent of itself.');
                    }
                },
            ],
        ]);

        try {

            $category->name = $request->input('name');
            $category->slug = str_replace(' ', '-', strtolower($request->input('name')));
            $category->description = $request->input('description');
            $category->parent_category_id = $request->input('parent_category_id');
            $category->status = !empty($request->input('status')) ? 1 : 0;

            // Handle image upload (if a new image is provided)
            if ($request->hasFile('image_path')) {
                // Delete old image if it exists
                if (!empty($category->image_path)) {
                    mmadev_delete_attachment_from_directory($category->image_path, 'categories');
                }

                $file = $request->file('image_path');
                // store image in folder and return image path
                $category->image_path = mmadev_store_and_get_image_path('categories', $file);
            }

            $category->save();

            $testimonialDates = $request->date;
            $testimonialUserNames = $request->user_name;
            $testimonials = $request->testimonial;
            
            if (!empty($category->testimonials)) {
                // Delete existing testimonials for this style
                Testimonial::where('category_id', $category->id)->delete();
                // Create new testimonials for this style
                foreach ($testimonials as $key => $testimonial) {
                    // Check if the testimonial is not empty
                    if (!empty($testimonial)) {
                        // Create new testimonial
                        $new_testimonial = new Testimonial();
                        $new_testimonial->category_id = $category->id;
                        $new_testimonial->date = $testimonialDates[$key];
                        $new_testimonial->user_name = $testimonialUserNames[$key];
                        $new_testimonial->testimonial = $testimonial;
                        $new_testimonial->save();
                    }
                }
            }

            $questions = $request->question;
            $answers = $request->answer;
            
            if (!empty($category->faqs)) {
                // Delete existing testimonials for this style
                Faq::where('category_id', $category->id)->delete();
                // Create new testimonials for this style
                foreach ($questions as $key => $question) {
                    // Check if the testimonial is not empty
                    if (!empty($question)) {
                        // Create new testimonial
                        $newFaq = new Faq();
                        $newFaq->category_id = $category->id;
                        $newFaq->question = $questions[$key];
                        $newFaq->answer = $answers[$key];
                        $newFaq->save();
                    }
                }
            }

            return redirect()->route('categories')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('category.edit', $category->id)->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            // Delete image from directory if it exists
            if (!empty($category->image_path)) {
                mmadev_delete_attachment_from_directory($category->image_path, 'categories');
            }
            $category->delete();
            return redirect()->route('categories')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('categories')->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

    public function remove_image(Request $request, Category $category)
    {
        try {
            // Remove the image_path from the Category model and Delete image from directory if it exists
            if (!empty($category->image_path)) {
                mmadev_delete_attachment_from_directory($category->image_path, 'categories');
                $category->image_path = null;
            }
            $category->save();

            // Return a success response
            return response()->json(['message' => 'Image removed successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error removing image'], 500);
        }
    }
}
