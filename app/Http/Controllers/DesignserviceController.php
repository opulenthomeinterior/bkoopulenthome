<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designservice;


class DesignserviceController extends Controller
{

    public function index() {
        $designservices = Designservice::all();
        return view('pages.forums.designservice.index', compact('designservices'));
    }

    public function submit_design_service(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'sur_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];

        $request->validate($rules);

        $designservice = new Designservice();
        $designservice->firstname = $request->input('first_name');
        $designservice->surname = $request->input('sur_name');
        $designservice->email = $request->input('email');
        $designservice->phone = $request->input('phone');
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $designservice->file_path = mmadev_store_and_get_image_path('DesignAppointment', $file);
        }
        
        $designservice->save();

        return redirect()->back()->with('success', 'We will get back to you shortly');
    }

    public function updateStatus(Request $request, $id)
    {
        $designservice = DesignService::findOrFail($id);
        
        $designservice->status = $request->status;
        $designservice->save();

        return response()->json(['message' => 'Status updated successfully']);
    }


}