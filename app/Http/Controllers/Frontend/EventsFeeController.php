<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EventAttendee;
use App\Models\Events;
use App\Models\Payment;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Config;


class EventsFeeController extends EventsController
{
    public function feeIndex($event)
    {
        
        if(session()->has('ses_attendee')){
            $id = session()->get('ses_attendee')['attendee_user']['id'];
            $event_detail = Events::where('slug', $event)->first();
            $event_fee = EventAttendee::where(['event_id' => $event_detail->id, 'attendee_id' => $id])->value('event_fee');
            if($event_fee == NULL)
                return view('frontend.events.fee');
            else
                return back();
        }
        return back();
    }

    public function charge_fee(Request $request, $event)
    {

        $validation = $request->validate([
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'cvv' => 'required',
            'email' => 'required',

        ]);

        if($validation){
            $secret = Config::get('services.stripe.secret');
            $stripe = Stripe::make($secret);
            $event_details = Events::where('slug', $event)->first();
            
            $amount = number_format($event_details->attendee_registration_fee, 2);
            
            try {
                
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->cardNumber,
                        'exp_month' => $request->month,
                        'exp_year'  => $request->year,
                        'cvc'       => $request->cvv,
                    ],
                ]);
                
                if (!isset($token['id'])) {
                    \Session::put('error', 'The Stripe Token was not generated correctly');
                    return redirect()->route('frontend.event.fee', $event);
                }
                $charge = $stripe->charges()->create([
                    'source' => $token['id'],
                    'currency' => 'USD',
                    'amount'   => $amount,
                    'description' => 'Add in wallet',
                ]);
                
                if ($charge['status'] == 'succeeded') {
                    /**
                     * Write Here Your Database insert logic.
                     */
                    try {

                        $event_fee = EventAttendee::where(['event_id' => $event_details->id ,'attendee_id'=>$request->attendee_id])->first();
            
                        $data['event_fee'] = $event_fee->update([
                            'event_fee' => 'Paid',
                            // 'event_fee' => NULL,
                        ]);
                        
                        $data['payment'] = $this->payments($event_fee, $charge, $event_details);
                        
                        return redirect()->route('frontend.events.show', $event); 

                    }catch (\Exception $e) {
                        \Session::put('error', $e->getMessage());
                        return redirect()->route('frontend.event.fee', $event, $event_details);
                    }

                } else {
                    \Session::put('error', 'Money not add in wallet!!');
                    return redirect()->route('frontend.event.fee', $event);
                }
            } catch (\Exception $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('frontend.event.fee', $event);
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('frontend.event.fee', $event);
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('frontend.event.fee', $event);
            }
        }



        return back();
    }


    public function payments($event_fee, $stripe_details, $event_details)
    {
        
        $title = 'Paid $'.$event_details->attendee_registration_fee.' for the '.$event_details->name.' event attendee fee.';
        
        $data['payments'] = Payment::create([
            'ref_type' => 'attendee fee',
            'ref_id' => $event_fee->id,
            'customer_id' => $event_fee->attendee_id,
            'title' => $title,
            'amount' => $event_details->attendee_registration_fee,
            'card_number' => $stripe_details['payment_method_details']['card']['last4'],
            'card_type' => $stripe_details['payment_method_details']['card']['brand'],
            'transaction_id' => $stripe_details['id'],
            'balance_transaction' => $stripe_details['balance_transaction'],
            'payment_method' => $stripe_details['payment_method'],
            'receipt_url' => $stripe_details['receipt_url'],
        ]);
        
        return $data['payments'];
    }
}
