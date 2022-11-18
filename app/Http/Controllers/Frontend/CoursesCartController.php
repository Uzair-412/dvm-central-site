<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\CoursePurchase;
use App\Models\Payment;
use Auth;
use Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Config;
use Illuminate\Http\Request;

class CoursesCartController extends Controller
{
    public $courseCart;

    public function __construct()
    {
        $this->courseCart = Cart::session(Config::get('app.cart.courses'));
    }

    public function index()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Course Category';
        $cart = $this->courseCart->getContent();
        $data['cart'] = $cart;
        $data['cart_total'] = $cart->count();
        $data['cart_subtotal'] = $this->courseCart->getSubTotal();
        return view('frontend.courses.cart', $data);
    }

    public function saveCart(Request $request)
    {
        if(!$this->courseCart->get($request->id))
        {
            $course = Course::find($request->id);
            $this->courseCart->add($request->id, $course->title, $course->price, 1);
        }
        return redirect()->route('frontend.course.cart.index')->with('flash_success', 'Course added in cart successfully.');
    }

    public function delCart(Request $request)
    {
        $this->courseCart->remove($request->id);
        return redirect()->route('frontend.course.cart.index')->with('flash_danger', 'Course removed from cart.');
    }

    public function checkout()
    {
        $cart = $this->courseCart->getContent();
        $data['cart'] = $cart;
        $data['cart_total'] = $cart->count();
        $data['cart_subtotal'] = $this->courseCart->getSubTotal();
        return view('frontend.courses.checkout', $data);
    }

    public function enrollCourse(Request $request)
    {
        if(Auth::user())
        {
            CourseEnrollment::create(['course_id' => $request->id, 'user_id' => Auth::user()->id, 'amount' => 0, 'course_payment_id' => 0]);
            return redirect('/dashboard')->with('flash_success', 'Courses enrolled successfully.');
        }
        else
        {
            return redirect()->back()->with('flash_danger', 'Please login before course enrollment.');
        }
    }

    public function purchase(Request $request)
    {
        $amount = $this->courseCart->getSubTotal();
        try {
            Stripe::setApiKey(config('app.STRIPE_SECRET'));
            $token = Stripe::tokens()->create([
                'card' => [
                    'number'    => $request->input('cardnumber'),
                    'exp_month' => $request->input('month'),
                    'cvc'       => $request->input('cvc'),
                    'exp_year'  => $request->input('year'),
                ],
            ]);
            $charge = Stripe::charges()->create([
                'source' => $token['id'],
                'currency' => 'USD',
                'amount' => round($amount, 2),
                'metadata' => [
                    'name' => $request->input('bl_name'),
                    'email' => $request->input('bl_email'),
                    'phone' => $request->input('bl_phone')
                ]
            ]);

            if($charge['status'] == 'succeeded')
            {
                $data['ref_type']           = 'course';
                $data['ref_id']             = 0;
                $data['customer_id']        = Auth::user()->id;
                $data['title']              = 'Paid $'.number_format($amount, 2).' for the purchase of course.';
                $data['amount']             = $amount;
                $data['card_number']        = $charge['source']['last4'];
                $data['card_type']          = $charge['source']['brand'];
                $data['transaction_id']     = $charge['id']; // First Data's Transaction Tag
                $data['balance_transaction'] = $charge['balance_transaction']; // First Data's Authorization Number
                $data['payment_method']     = $charge['payment_method']; // Our own generated number for cross reference at First Data
                $data['receipt_url']        = $charge['receipt_url']; // First Data Returns CTR - Response so saving that
    
                $course_payment = Payment::create($data);

                $cart = $this->courseCart->getContent();
                foreach($cart as $course_cart)
                {
                    CourseEnrollment::create(['course_id' => $course_cart->id, 'user_id' => Auth::user()->id, 'amount' => $course_cart->price, 'course_payment_id' => $course_payment->id]);
                }
                $this->courseCart->clear();
                return redirect('/dashboard')->with('flash_success', 'Courses enrolled successfully.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('flash_danger', $th->getMessage());
        }
    }
}
