<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colour;

class ColourController extends Controller
{
    public function index()
    {
        $colours = Colour::all();
        return view('pages.colours.index', compact('colours'));
    }

    public function create()
    {
        return view('pages.colours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'colour_code' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'finishing' => 'nullable|in:Gloss,Matt,Standard MFC',
        ]);

        try {
            $colour = new Colour();
            $colour->name = $request->input('name');
            // $colour->slug = str_replace(' ', '-', strtolower($request->input('name')));
            $colour->colour_code = $request->input('colour_code');
            $colour->finishing = $request->input('finishing');
            $colour->status = !empty($request->input('status')) ? 1 : 0;

            // Handle image upload (if a new image is provided)
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                // store image in folder and return image path
                $colour->image_path = mmadev_store_and_get_image_path('colours', $file);
            }

            $colour->save();

            return redirect()->route('colours')->with('success', 'Colour created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('colours.create')->with('error', 'Error creating colour: ' . $e->getMessage());
        }
    }

    public function edit(Colour $colour)
    {
        return view('pages.colours.edit', compact('colour'));
    }

    public function update(Request $request, Colour $colour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'colour_code' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'finishing' => 'nullable|in:Gloss,Matt,Standard MFC',
        ]);

        // echo "<pre>";
        // print_r($request->all());
        // exit;

        try {

            $colour->name = $request->input('name');
            // $colour->slug = str_replace(' ', '-', strtolower($request->input('name')));
            $colour->colour_code = $request->input('colour_code');
            $colour->finishing = $request->input('finishing');
            $colour->status = !empty($request->input('status')) ? 1 : 0;

            // Handle image upload (if a new image is provided)
            if ($request->hasFile('image_path')) {
                // Delete old image if it exists
                if (!empty($colour->image_path)) {
                    mmadev_delete_attachment_from_directory($colour->image_path, 'colours');
                }

                $file = $request->file('image_path');
                // store image in folder and return image path
                $colour->image_path = mmadev_store_and_get_image_path('colours', $file);
            }

            $colour->save();

            return redirect()->route('colours')->with('success', 'Colour updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('colours.edit', $colour->id)->with('error', 'Error updating colour: ' . $e->getMessage());
        }
    }

    public function destroy(Colour $colour)
    {
        try {
            // Delete image from directory if it exists
            if (!empty($colour->image_path)) {
                mmadev_delete_attachment_from_directory($colour->image_path, 'colours');
            }
            $colour->delete();
            return redirect()->route('colours')->with('success', 'Colour deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('colours')->with('error', 'Error deleting colour: ' . $e->getMessage());
        }
    }

    public function remove_image(Request $request, Colour $colour)
    {
        try {
            // Remove the image_path from the Colour model and Delete image from directory if it exists
            if (!empty($colour->image_path)) {
                mmadev_delete_attachment_from_directory($colour->image_path, 'colours');
                $colour->image_path = null;
            }
            $colour->save();

            // Return a success response
            return response()->json(['message' => 'Image removed successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error removing image'], 500);
        }
    }
}
