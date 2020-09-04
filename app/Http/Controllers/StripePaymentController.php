<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use Input;
use URL;
use Stripe;

class StripePaymentController extends Controller
{

    /**
     * Call validation of the Stripe payment.
     * @param  Request  $request
     * @return Response
     */
    public function stripePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            'amount' => 'required',
        ]);
        $input = $request->all();
        if ($validator->passes()) {
            //$input = array_except($input, array('_token'));
            $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    return response()->json(['error' => 'Token error']);
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'EUR',
                    'amount' => $request->get('amount'),
                    'description' => '',
                ]);

                if ($charge['status'] == 'succeeded') {
                    return response()->json(['ok' => 'Votre paiement a bien été accepté. Merci ! 💙']);
                } else {
                    return response()->json(['error' => 'Votre paiement a été refusé. Désolé ! 🤔']);
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
}
