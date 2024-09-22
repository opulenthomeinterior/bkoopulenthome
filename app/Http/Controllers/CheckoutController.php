<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $validatedData = $request->validate([
            // Validation rules for the first step of checkout
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'delivery_country' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'house_number' => 'nullable|string|max:255',
            'street_address' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'order_reference' => 'nullable|string|max:255',
            'delivery_date' => 'nullable|date',

            // Validation rules for the second step of checkout
            'contact_first_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'contact_company_name' => 'nullable|string|max:255',
            'contact_email_address' => 'required|email|max:255',
            'contact_mobile_number' => 'required|string|max:255',

            // Validation rules for the third step of checkout
            'payment_method' => 'required|string|max:255',
            'cardholder_name' => 'required|string|max:255',
            'cardholder_email' => 'required|email|max:255',
            'cardholder_mobile' => 'required|string|max:255',
            'cardholder_address' => 'required|string|max:255',
            'cardholder_address_line2' => 'nullable|string|max:255',
            'cardholder_city' => 'nullable|string|max:255',
            'cardholder_country' => 'nullable|string|max:255',
            'cardholder_postcode' => 'nullable|string|max:255',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $items = $request->input('items', []); // Expected format: [['id' => 1, 'quantity' => 2], ['id' => 2, 'quantity' => 3]]
        $lineItems = [];
        $products = [];
        if ($validatedData['payment_method'] === 'klarna') {
            $converter = new CurrencyConverterController();
            $fromCurrency = 'eur';
            $toCurrency = 'usd';
            // Coversion rate (API Call)
            $currency_value = $converter->convertOneCurrency($fromCurrency, $toCurrency);
            $conversion_rate = $currency_value['conversion_rate'];

            foreach ($items as $item) {
                $product = Product::find($item['id']);
                if (!$product) {
                    continue; // Skip if product not found
                }
                $imageUrl = $product->image_path ? asset("uploads/products/" . $product->image_path) : '';

                $lineItems[] = [
                    'price_data' => [
                        'currency' => $validatedData['payment_method'] === 'klarna' ? 'usd' : 'eur',
                        'product_data' => [
                            'name' => $product->full_title,
                            'images' => [$imageUrl], // Optional: Include if you have an image path
                        ],
                        'unit_amount' => round(($conversion_rate * $product->discounted_price), 2) * 100, // Stripe expects amount in cents
                    ],
                    'quantity' => $item['quantity'],
                ];

                $product->quantity = $item['quantity'];
                $products[] = $product;
            }
        } else {
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                if (!$product) {
                    continue; // Skip if product not found
                }
                $imageUrl = $product->image_path ? asset("uploads/products/" . $product->image_path) : '';

                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $product->full_title,
                            'images' => [$imageUrl], // Optional: Include if you have an image path
                        ],
                        'unit_amount' => $product->discounted_price * 100, // Stripe expects amount in cents
                    ],
                    'quantity' => $item['quantity'],
                ];

                $totalAmount = $product->discounted_price * $item['quantity']; // Calculate total amount

                $product->quantity = $item['quantity'];
                $product->total_amount = $totalAmount;
                $products[] = $product;
            }
        }


        if (empty($lineItems)) {
            return back()->withErrors(['message' => 'No valid products for checkout.']);
        }

        // echo "<pre>"; 
        // print_r($lineItems); 
        // echo "</pre>"; 
        // die;
        $customer_email = $validatedData['contact_email_address'];

        if ($request->input('discount_code')) {
            $session = StripeSession::create([
                'payment_method_types' => [$validatedData['payment_method']],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                // 'billing_address_collection' => 'required',
                'customer_email' => $customer_email,
                'discounts' => [
                    [
                        'coupon' => $request->input('discount_code'),
                    ],
                ],
            ]);
        } else {
            $session = StripeSession::create([
                'payment_method_types' => [$validatedData['payment_method']],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                // 'billing_address_collection' => 'required',
                'customer_email' => $customer_email,
            ]);
        }
        
        // dd($session);
        $delivery_details = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'mobile' => $validatedData['mobile'],
            'delivery_country' => $validatedData['delivery_country'],
            'postcode' => $validatedData['postcode'],
            'house_number' => $validatedData['house_number'],
            'street_address' => $validatedData['street_address'],
            'address_line2' => $validatedData['address_line2'],
            'city' => $validatedData['city'],
            'order_reference' => $validatedData['order_reference'],
            'delivery_date' => $validatedData['delivery_date'],
        ];
        $contact_details = [
            'first_name' => $validatedData['contact_first_name'],
            'last_name' => $validatedData['contact_last_name'],
            'company_name' => $validatedData['contact_company_name'],
            'email_address' => $validatedData['contact_email_address'],
            'mobile_number' => $validatedData['contact_mobile_number'],
        ];
        $payment_details = [
            'payment_method' => $validatedData['payment_method'],
            'cardholder_name' => $validatedData['cardholder_name'],
            'cardholder_email' => $validatedData['cardholder_email'],
            'cardholder_mobile' => $validatedData['cardholder_mobile'],
            'cardholder_address' => $validatedData['cardholder_address'],
            'cardholder_address_line2' => $validatedData['cardholder_address_line2'],
            'cardholder_city' => $validatedData['cardholder_city'],
            'cardholder_country' => $validatedData['cardholder_country'],
            'cardholder_postcode' => $validatedData['cardholder_postcode'],
        ];
        session([
            'order_details' => $products,
            'delivery_details' => $delivery_details,
            'contact_details' => $contact_details,
            'payment_details' => $payment_details,
        ]);

        if (isset($session->id) && !empty($session->id)) {
            return redirect($session->url, 303);
        } else {
            return redirect()->route('checkout.cancel');
        }
    }

    public function checkout_success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session_id = $request->input('session_id');

        if (!$session_id) {
            return redirect()->route('checkout');
        }

        $session = StripeSession::retrieve($session_id);
        $lineItems = StripeSession::allLineItems($session_id);
        $orderDetails = session('order_details', []);
        $deliveryDetails = session('delivery_details', []);
        $contactDetails = session('contact_details', []);
        $paymentDetails = session('payment_details', []);

        // dd($session);
        if ($session->payment_status === 'paid') {

            if (!session('order_details') || !session('delivery_details') || !session('contact_details') || !session('payment_details')) {

                $order = Order::where('session_id', $session_id)->first();

                if ($order) {
                    $order->order_details = json_decode($order->order_items, true);
                    // echo "<pre>";
                    // print_r($order);
                    // echo "</pre>";
                    // die;

                    $empty_cart = '0';

                    return view('frontend.shop.order.orderconfirmed', compact('session', 'lineItems', 'order', 'empty_cart'));
                } else {
                    return redirect()->route('checkout');
                }
            } else {

                $order = new Order();
                $order->order_number = $this->generateUniqueOrderNumber(); // Replace with your logic to generate a unique order number
                $order->user_id = auth()->user()->id ?? null;

                // Delivery Details
                $order->first_name = $deliveryDetails['first_name'];
                $order->last_name = $deliveryDetails['last_name'];
                $order->mobile = $deliveryDetails['mobile'];
                $order->delivery_country = $deliveryDetails['delivery_country'];
                $order->postcode = $deliveryDetails['postcode'];
                $order->house_number = $deliveryDetails['house_number'];
                $order->street_address = $deliveryDetails['street_address'];
                $order->address_line2 = $deliveryDetails['address_line2'];
                $order->city = $deliveryDetails['city'];
                $order->order_reference = $deliveryDetails['order_reference'];
                $order->delivery_date = $deliveryDetails['delivery_date'];

                // Account Details
                $order->contact_first_name = $contactDetails['first_name'];
                $order->contact_last_name = $contactDetails['last_name'];
                $order->contact_company_name = $contactDetails['company_name'];
                $order->contact_email_address = $contactDetails['email_address'];
                $order->contact_mobile_number = $contactDetails['mobile_number'];

                // Card Holder Details
                $order->payment_method = $paymentDetails['payment_method'];
                $order->cardholder_name = $paymentDetails['cardholder_name'];
                $order->cardholder_email = $paymentDetails['cardholder_email'];
                $order->cardholder_mobile = $paymentDetails['cardholder_mobile'];
                $order->cardholder_address = $paymentDetails['cardholder_address'];
                $order->cardholder_address_line2 = $paymentDetails['cardholder_address_line2'];
                $order->cardholder_city = $paymentDetails['cardholder_city'];
                $order->cardholder_country = $paymentDetails['cardholder_country'];
                $order->cardholder_postcode = $paymentDetails['cardholder_postcode'];

                // Stripe payment details
                $order->session_id = $session_id;
                $order->payment_intent_id = $session->payment_intent;
                $order->payment_status = $session->payment_status;
                $order->currency = $session->currency;
                $order->total_amount = $session->amount_total / 100; // Replace with your logic to calculate the order total

                $order->order_items = json_encode($orderDetails);
                $order->order_status = 'pending';

                $order->customer_name = $session->customer_details->name;
                $order->customer_email = $session->customer_details->email;
                $order->save();

                $order->order_details = json_decode($order->order_items, true);

                session()->forget('order_details');
                session()->forget('delivery_details');
                session()->forget('contact_details');
                session()->forget('payment_details');

                $empty_cart = '1';

                return view('frontend.shop.order.orderconfirmed', compact('session', 'lineItems', 'order', 'empty_cart'));
            }
        } else {
            return redirect()->route('checkout.cancel');
        }
    }

    public function checkout_cancel(Request $request)
    {
        return redirect()->route('checkout');
    }

    public function generateUniqueOrderNumber()
    {
        $order_number = 'ORD' . time() . rand(1000, 9999);
        return $order_number;
    }

    // public function order_history()
    // {
    //     if (!auth()->user()) {
    //         return redirect()->route('login');
    //     }
    //     $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
    //     return view('frontend.shop.order.orderhistory', compact('orders'));
    // }
}
