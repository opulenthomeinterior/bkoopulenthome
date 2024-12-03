<?php

namespace App\Http\Controllers;

use App\Models\DownloadableGuide;
use Illuminate\Http\Request;

class DownloadableGuideController extends Controller
{
    public function index()
    {
        $guides = DownloadableGuide::all();
        return view('pages.helpandguides.downloadableguides.index', compact('guides'));
    }

    public function create()
    {
        return view('pages.helpandguides.downloadableguides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        try {
            $guide = new DownloadableGuide();
            $guide->title = $request->title;
            $guide->type = $request->file_type;

            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $fileSize = $file->getSize();

                $guide->file_size = $fileSize;
                $guide->file_path = mmadev_store_and_get_image_path('guides', $file);

            }
            $guide->save();

            return redirect()->route('downloadableguides')->with('success', 'Downloadable guide created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('downloadableguides')->with('error', 'An error occurred while creating the downloadable guide.');
        }
    }

    public function edit($id)
    {
        try {
            $guide = DownloadableGuide::findOrFail($id);
            return view('pages.helpandguides.downloadableguides.edit', compact('guide'));
        } catch (\Exception $e) {
            return redirect()->route('downloadableguides')->with('error', 'An error occurred while editing the downloadable guide.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        try {
            $guide = DownloadableGuide::findOrFail($id);
            $guide->title = $request->title;
            $guide->type = $request->file_type;

            // Handle image upload (if a new image is provided)
            if ($request->hasFile('file_path')) {
                // Delete old image if it exists
                if (!empty($guide->file_path)) {
                    mmadev_delete_attachment_from_directory($guide->file_path, 'guides');
                }

                $file = $request->file('file_path');

                $fileSize = $file->getSize();
                $guide->file_size = $fileSize;

                // store image in folder and return image path
                $guide->file_path = mmadev_store_and_get_image_path('guides', $file);
            }
            $guide->save();

            return redirect()->route('downloadableguides')->with('success', 'Downloadable guide updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('downloadableguides')->with('error', 'An error occurred while updating the downloadable guide.');
        }
    }

    public function destroy($id)
    {
        try {
            $guide = DownloadableGuide::findOrFail($id);

            // Delete file from directory if it exists
            if (!empty($guide->file_path)) {
                mmadev_delete_attachment_from_directory($guide->file_path, 'guides');
            }

            $guide->delete();

            return redirect()->route('downloadableguides')->with('success', 'Downloadable guide deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('downloadableguides')->with('error', 'An error occurred while deleting the downloadable guide.');
        }
    }
}