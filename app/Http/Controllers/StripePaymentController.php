<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirm;
use Session;
use Stripe;
use App\Billing;
use App\Billing_detail;


class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $grand_total = $request->grand_total;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $grand_total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Our Ecommerce"
        ]);
        Billing::find($request->billing_id)->update([
          'payment_status' =>2
        ]);

         $sale_id = $request->session()->get('sale_id');
           $sale_id = Billing_detail::where('sale_id', $sale_id)->get();

           $email = Auth::user()->email;
         Mail::to($email)->send(new OrderConfirm($sale_id));
        Session::flash('success', 'Payment successful!');

        return redirect('Shipping/Cart');
    }
}
