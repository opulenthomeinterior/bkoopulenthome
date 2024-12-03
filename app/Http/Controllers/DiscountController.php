<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use Stripe\Coupon;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class DiscountController extends Controller
{
    // public function index()
    // {
    //     $discounts = Discount::all();
    //     return view('pages.coupons.index', compact('discounts'));
    // }

    public function create()
    {
        return view('pages.coupons.create');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'code' => 'required|string|max:50|unique:discounts',
    //         'percentage' => 'required|numeric|min:1|max:100',
    //         'status' => 'required|in:active,inactive',
    //         'expiry' => 'required|date|after_or_equal:today',
    //     ]);

    //     $discount = new Discount();
    //     $discount->title = $request->title;
    //     $discount->code = $request->code;
    //     $discount->percentage = $request->percentage;
    //     $discount->status = $request->status;
    //     $discount->expiry_date = $request->expiry;

    //     $discount->save();

    //     return redirect()->route('discounts')->with('success', 'Discount created successfully.');
    // }

    public function edit($id)
    {
        // $discount = Discount::findOrFail($id);
        // return view('pages.coupons.edit', compact('discount'));
        try {
            $coupon = Coupon::retrieve($id);
            return view('pages.coupons.edit', compact('coupon'));
        } catch (ApiErrorException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'code' => 'required|string|max:50|unique:discounts,code,'.$id,
    //         'percentage' => 'required|numeric|min:1|max:100',
    //         'status' => 'required|in:active,inactive',
    //         'expiry' => 'required|date|after_or_equal:today',
    //     ]);

    //     $discount = Discount::findOrFail($id);
    //     $discount->title = $request->title;
    //     $discount->code = $request->code;
    //     $discount->percentage = $request->percentage;
    //     $discount->status = $request->status;
    //     $discount->expiry_date = $request->expiry;



    //     $discount->save();

    //     return redirect()->route('discounts')->with('success', 'Discount updated successfully.');
    // }

    // public function destroy($id)
    // {
    //     try {
    //         $video = Discount::findOrFail($id);
    //         $video->delete();

    //         return redirect()->route('discounts')->with('success', 'Discount deleted successfully.');
    //     } catch (\Exception $e) {
    //         return redirect()->route('discounts')->with('error', 'An error occurred while deleting the discount.');
    //     }
    // }

    // public function apply_promocode(Request $request)
    // {
    //     $discount = Discount::where('code', $request->code)->where('status', 'active')->where('expiry_date', '>=', date('Y-m-d'))->first();
    //     if ($discount) {
    //         return response()->json(['status' => 'success', 'result' => $discount]);
    //     } else {
    //         return response()->json(['status' => 'error', 'result' => false]);
    //     }
    // }

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    // Get all coupons
    public function index()
    {
        try {
            $coupons = Coupon::all();
            // echo "<pre>";
            // print_r($coupons);
            // echo "</pre>";
            // die();
            return view('pages.coupons.index', ['coupons' => $coupons]);
        } catch (ApiErrorException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Create a coupon
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'percent_off' => 'required|integer|min:1|max:100',
            'duration' => 'required|string|in:forever,once,repeating',
            'duration_in_months' => 'nullable|required_if:duration,repeating|integer|min:1',
            'redeem_by' => 'nullable|date',
            'max_redemptions' => 'nullable|integer|min:1',
            'minimum_order' => 'nullable|numeric|min:0',
        ]);

        try {
            // Generate a random coupon code
            $couponCode = $request->input('code');

            $coupon = Coupon::create([
                'name' => $request->input('name'),
                'percent_off' => $request->input('percent_off'),
                'duration' => $request->input('duration'),
                'duration_in_months' => $request->input('duration_in_months'),
                'redeem_by' => $request->input('redeem_by') ? strtotime($request->input('redeem_by')) : null,
                'max_redemptions' => $request->input('max_redemptions') ? $request->input('max_redemptions') : null,
                'id' => $couponCode,
                'metadata' => [
                    'minimum_order' => $request->input('minimum_order') ? $request->input('minimum_order') : 0,
                ],
            ]);

            return redirect()->back()->with('success', 'Coupon created successfully!');
        } catch (ApiErrorException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Update a coupon
    public function update(Request $request, $couponId)
    {
        $request->validate([
            'name' => 'required|string',
            'minimum_order' => 'nullable|numeric|min:0',
        ]);

        try {
            // Retrieve the existing coupon
            $coupon = Coupon::retrieve($couponId);

            // Update the coupon properties
            $coupon->name = $request->input('name');
            $coupon->metadata = [
                'minimum_order' => $request->input('minimum_order') ?: 0,
            ];

            // Save the updated coupon
            $coupon->save();

            return redirect()->back()->with('success', 'Coupon updated successfully!');
        } catch (ApiErrorException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Delete a coupon
    public function destroy($couponId)
    {
        try {
            $coupon = Coupon::retrieve($couponId);
            $coupon->delete();
            return redirect()->back()->with('success', 'Coupon deleted successfully!');
        } catch (ApiErrorException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Apply a coupon
    public function apply_promocode(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        try {
            $coupon = Coupon::retrieve($request->input('code'));
            return response()->json(['status' => 'success', 'result' => $coupon]);
        } catch (ApiErrorException $e) {
            return response()->json(['status' => 'error', 'result' => false]);
        }
    }
}
