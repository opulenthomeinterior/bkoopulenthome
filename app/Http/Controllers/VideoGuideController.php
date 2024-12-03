<?php

namespace App\Http\Controllers;

use App\Models\VideoGuide;
use Illuminate\Http\Request;
use App\Rules\YoutubeValidLink;

class VideoGuideController extends Controller
{
    public function index()
    {
        $videoGuides = VideoGuide::all();
        return view('pages.helpandguides.videoguides.index', compact('videoGuides'));
    }

    public function create() 
    {
        return view('pages.helpandguides.videoguides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => ['required', 'url', new YoutubeValidLink],
        ]);

        try {
            $video = new VideoGuide();
            $video->title = $request->title;
            $video->video_url = $request->video_url;
            $video->type = $request->video_type; 

            $video->save();

            return redirect()->route('videoguides')->with('success', 'Video guide created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('videoguides')->with('error', 'An error occurred while creating the video guide.');
        }
    }

    public function edit($id)
    {
        try {
            $videoGuide = VideoGuide::findOrFail($id);
            return view('pages.helpandguides.videoguides.edit', compact('videoGuide'));
        } catch (\Exception $e) {
            return redirect()->route('videoguides')->with('error', 'An error occurred while editing the video guide.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => ['required', 'url', new YoutubeValidLink],
        ]);

        try {
            $video = VideoGuide::findOrFail($id);
            $video->title = $request->title;
            $video->video_url = $request->video_url;
            $video->type = $request->video_type; 
            $video->save();

            return redirect()->route('videoguides')->with('success', 'Video guide updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('videoguides')->with('error', 'An error occurred while updating the video guide.');
        }
    }

    public function destroy($id)
    {
        try {
            $video = VideoGuide::findOrFail($id);
            $video->delete();

            return redirect()->route('videoguides')->with('success', 'Video guide deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('videoguides')->with('error', 'An error occurred while deleting the video guide.');
        }
    }
}