<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;


class FaqController extends Controller
{
   public function index()
   {
       $faqs = Faq::all();
       return view('pages.faq.index', compact('faqs'));
   }

   public function create()
   {
       return view('pages.faq.create');
   }

   public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'faq_type' => 'required|in:general,delivery',
        ]);

        try {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->type = $request->faq_type; 

            $faq->save();

            return redirect()->route('faqs.index')->with('success', 'Faq created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('faq.create')->with('error', 'Error creating blog: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $faq = Faq::find($id);
            return view('pages.faq.edit', compact('faq'));
        } catch (\Exception $e) {
            return redirect()->route('faqs.index')->with('error', 'Error editing blog: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
      $request->validate([
         'question' => 'required|string|max:255',
         'answer' => 'required',
         'faq_type' => 'required|in:general,delivery',
     ]);

      $faq = Faq::find($id);
      $faq->question = $request->question;
      $faq->answer = $request->answer;
      $faq->type = $request->faq_type; 

      $faq->save();

      return redirect()->route('faqs.index')->with('success', 'Faq updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $faq = Faq::find($id);
            $faq->delete();

            return redirect()->route('faqs.index')->with('success', 'Faq deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('faqs.index')->with('error', 'Error deleting Faq: ' . $e->getMessage());
        }
    }
}