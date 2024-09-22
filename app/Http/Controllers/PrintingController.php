<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printing;


class PrintingController extends Controller
{
    public function index(){
        
        $printing = Printing::all();
        return view('pages.forums.printing.index', compact('printing'));
    }

    public function submit_print_resources(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'sur_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'purpose' => 'required',
        ];

        $request->validate($rules);

        $printResource = new Printing();
        $printResource->firstname = $request->input('first_name');
        $printResource->surname = $request->input('sur_name');
        $printResource->email = $request->input('email');
        $printResource->phone = $request->input('phone');
        $printResource->company = $request->input('company');
        $printResource->address1 = $request->input('address1');
        $printResource->address2 = $request->input('address2');
        $printResource->city = $request->input('city');
        $printResource->country = $request->input('country');
        $printResource->purpose = $request->input('purpose');
        $printResource->save();

        return redirect()->back()->with('success', 'Your print resource request has been submitted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $print = Printing::findOrFail($id);
        
        $print->status = $request->status;
        $print->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}