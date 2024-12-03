<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assembly;

class AssemblyController extends Controller
{
    public function index()
    {
        $assemblies = Assembly::all();
        return view('pages.assemblies.index', compact('assemblies'));
    }

    public function create()
    {
        return view('pages.assemblies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $assembly = new Assembly();
            $assembly->name = $request->input('name');
            $assembly->slug = str_replace(' ', '-', strtolower($request->input('name')));
            $assembly->status = !empty($request->input('status')) ? 1 : 0;
            $assembly->save();

            return redirect()->route('assemblies')->with('success', 'Assembly created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('assembly.create')->with('error', 'Error creating assembly: ' . $e->getMessage());
        }
    }

    public function edit(Assembly $assembly)
    {
        return view('pages.assemblies.edit', compact('assembly'));
    }

    public function update(Request $request, Assembly $assembly)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $assembly->name = $request->input('name');
            $assembly->slug = str_replace(' ', '-', strtolower($request->input('name')));
            $assembly->status = !empty($request->input('status')) ? 1 : 0;
            $assembly->save();

            return redirect()->route('assemblies')->with('success', 'Assembly updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('assembly.edit', $assembly->id)->with('error', 'Error updating assembly: ' . $e->getMessage());
        }
    }

    public function destroy(Assembly $assembly)
    {
        try {
            $assembly->delete();
            return redirect()->route('assemblies')->with('success', 'Assembly deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('assemblies')->with('error', 'Error deleting assembly: ' . $e->getMessage());
        }
    }
}
