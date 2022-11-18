<!-- Modal -->
<div class="modal fade" id="modal_stripe" tabindex="-1" role="dialog" aria-labelledby="modal_stripe_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form name="frm_payment" id="frm_payment" method="POST" action="{{ route('frontend.process-payment') }}" publishable-key="{{ env('STRIPE_KEY') }}">
                    @csrf

                    <h3>Card Details</h3>

                    <div class="form-group mb-3 fs-15">
                        You are about to pay <span class="font-weight-bold">${{ number_format(product_cart()->getTotal(), 2) }}</span> for your order.
                    </div>

                    <div id="card-errors" class="alert alert-warning @if(!isset($data['card_error'])) d-none @endif" role="alert">
                        @if(isset($data['card_error']))
                            {{ $data['card_error'] }}
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <input required name="bl_name" id="bl_name" type="text" class="form-control" placeholder="Name on Card">
                    </div>
                    <div class="form-group mb-3">
                        <input required name="bl_email" id="bl_email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mb-3">
                        <input required name="bl_phone" id="bl_phone" type="text" class="form-control" placeholder="Phone">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="card-element"></div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-lg btn-success font-weight-bolder p-3 fs-16">Pay Now!</button>
                    </div>
                    <div class="mt-3">
                        <img class="lazyload" data-src="static/img/stripe.webp" alt="Secure Payments with Stripe">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>