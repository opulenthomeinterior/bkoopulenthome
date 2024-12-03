<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index(Request $request)
    {
        // if search query is available
        if ($request->has('search') && !empty($request->search)) {
            $attachments = Attachment::where('name', 'like', '%' . $request->search . '%')->latest()->paginate(100);
            return view('pages.attachments.index', compact('attachments'));
        } else {
            $attachments = Attachment::latest()->paginate(100);
            return view('pages.attachments.index', compact('attachments'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // max 100 images can be uploaded at once
        if (count($request->file('images')) > 100) {
            return redirect()->back()->with('error', 'Max 100 images can be uploaded at once.');
        }

        $all_images = [];

        foreach ($request->file('images') as $key => $image) {
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original name without extension
            $all_images[$key]['name'] = $imageName;

            $extension = $image->getClientOriginalExtension(); // Get the original extension
            $imageName = str_replace(' ', '-', trim($imageName)) . time() . '_' . uniqid() . '.' . $extension; // Construct the new file name

            // $imageName = time() . '_' . uniqid() . '.' . $image->extension();

            $image->move(public_path('imgs/products'), $imageName);
            $all_images[$key]['path'] = $imageName;
        }

        // echo '<pre>';
        // print_r($all_images);
        // echo '</pre>';
        // exit;

        foreach ($all_images as $img) {
            $image = new Attachment();
            $image->name = $img['name'];
            $image->path = $img['path'];
            $image->save();
        }

        return redirect()->route('attachments.index');
    }

    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        $imagePath = public_path('imgs/products/' . $attachment->path); // 'imgs/products/' is the path where images are stored, you can change it to your own path
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $attachment->delete();

        return redirect()->route('attachments.index');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'selectedIds' => 'required'
        ]);

        $ids = explode(',', $request->selectedIds);

        if (!empty($ids)) {
            $attachments = Attachment::get();

            foreach ($attachments as $attachment) {
                $imagePath = public_path('imgs/products/' . $attachment->path); // 'imgs/products/' is the path where images are stored, you can change it to your own path
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $attachment->delete();
            }
        }

        return redirect()->route('attachments.index')->with('success', 'Selected attachments have been deleted.');
    }
}
