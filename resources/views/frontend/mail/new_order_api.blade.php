<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap"
        rel="stylesheet" /> -->
    <title>Customer Order</title>
</head>

<body style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Work Sans', sans-serif;
        }

        .main {
            background: #f9f9f9;
        }

        .main-container {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
        }

        .main-container .section {
            padding: 4%;
            border: 2px solid #ddd;
            border-top: none
        }

        .main-container .section:nth-child(1) {
            border-top: 2px solid #ddd;
        }

        .line-height {
            line-height: 2;
        }

        a.order-status-btn {
            background: #418ffe;
            color: #fff;
            padding: 10px;
            display: inline-block;
            text-decoration: none;
            border-radius: 10px;
            margin: 20px;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
        }

        .sub-heading svg {
            width: 30px;
        }

        .sub-heading h3 {
            color: #418ffe;
            font-weight: 500;
            text-transform: uppercase;
        }

        .section .content .heading {
            color: #418ffe;
        }

        table.sub-heading {
            margin-bottom: 10px;
        }

        table.sub-heading tr:nth-child(1) td:nth-child(1) {
            width: 36px;
        }

        .dim-title {
            color: #b5b5b5;
        }

        table.order-detail table tr td p {
            line-height: 2;
        }
    </style>
    <div class="main" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; background: #f9f9f9;">
        <div class="main-container" style="padding: 0; font-family: 'Work Sans', sans-serif; background-color: #ffffff; margin: 0 auto; width: 100%; max-width: 600px;">
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: 2px solid #ddd;">
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe; text-align: center; font-weight: 600; font-size: 28px;">Your order is placed!</p>
                <p class="line-height" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; line-height: 2;">Hi {{ $order->first_name }} {{ $order->last_name }}</p>
                <p class="line-height" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; line-height: 2;">Thanks you for ordering from DVM Central!</p>
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">We are excited for you to receive your order # {{ $order->id }} and will notify you once it's on its way. If you have ordered from multiple sellers, your items will be delivered in separate packages. We hope you had a great shopping experience! You can check your order status here.</p>
                <div class="text-center" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: center;">
                    <a href="{{ url('dashboard/orders/'.$order->id) }}" class="order-status-btn" style="font-family: 'Work Sans', sans-serif; background: #418ffe; color: #fff; padding: 10px; display: inline-block; text-decoration: none; border-radius: 10px; margin: 20px;">Order Status</a>
                </div>
                <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; margin-bottom: 10px;">
                    <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">Please note, we are unable to change your delivery address once your order is placed.</div>
                </div>
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">Here's a confirmation of what you bought in your order.</p>
            </div>
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: none;">
                <table class="sub-heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%; margin-bottom: 10px;" width="100%">
                    <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 36px;" width="36">
                            <img src="{{ url('img/Box-icon.png') }}" alt="Delivery-Details-Icon" style="width: 30px;" />
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <h3 style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe; font-weight: 500; text-transform: uppercase;">Delivery Details</h3>
                        </td>
                    </tr>
                </table>
                <div class="content" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                    <table style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%;"
                        width="100%">
                        <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Name:</span>
                            </td>
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <span style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">{{ $order->first_name }} {{ $order->last_name }}</span>
                            </td>
                        </tr>
                        <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <td>
                                <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Address:</span>
                            </td>
                            <td>
                                @php
                                    $country = \App\Models\Country::find($order->country);
                                    $state = \App\Models\State::where('iso2',$order->state)->first();
                                @endphp
                                <span style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">{{ $order->address1 }}, {{ $order->address2 }}, {{ $order->city }} - {{ @$state->name }}, {{ $order->zip_code }} {{ @$country->name }}</span>
                            </td>
                        </tr>
                        <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Phone:</span>
                            </td>
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <span style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">{{ $order->phone }}</span>
                            </td>
                        </tr>
                        <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <span class="heading" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe;">Email:</span>
                            </td>
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <a href="mailto:farhanasim@gmail.com" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #ff0000;">
                                    {{ $order->email }}</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: none;">
                <table class="sub-heading"
                    style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%; margin-bottom: 10px;" width="100%">
                    <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 36px;" width="36">
                            <img src="{{ url('img/note-book.png') }}" alt="Order-Detail-Icon" style="width: 30px;" />
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <h3 style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe; font-weight: 500; text-transform: uppercase;">
                                Order Detail</h3>
                        </td>
                    </tr>
                </table>
                <table class="order-detail" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%;" width="100%">
                    @php
                        $i=1;
                        $discount = 0;
                    @endphp
                    @foreach ($items as $key => $vendor_data)
                        @foreach ($vendor_data['list'] as $item)
                           @php
                              $vendor = \App\Models\Vendor::find($item['attributes']['vendor_id']);
                           @endphp
                           <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                              <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                 <table style="font-family: 'Work Sans', sans-serif; width: 100%; border-right: 2px solid #418ffe; background: #418ffe08; padding: 8px; margin: 10px 0px;" width="100%">
                                       <tr>
                                          <td colspan="2" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                             <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #b5b5b5; line-height: 2;">Package {{ $i }}</div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                             <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; line-height: 2;">Sold by {{ $vendor->name }}</div>
                                          </td>
                                       </tr>
                                       {{-- <tr>
                                          <td colspan="2" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                             <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; line-height: 2;">Estimated delivery between 26 January - 02 February</div>
                                          </td>
                                       </tr> --}}
                                       <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                          <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100px;" width="100">
                                             <img src="{{ $item['attributes']['image'] }}"
                                                   alt="asdf" style="width:100%" />
                                          </td>
                                          <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                             @php
                                                   if($item['attributes']['discount']==0)
                                                   {
                                                      $price = $item['attributes']['price_catalog'];
                                                   }
                                                   else {
                                                      $price = $item['attributes']['price_discounted'];
                                                   }
                                             @endphp
                                             <div style="margin-left: 12px;">
                                                   <div href="{{ url($item['attributes']['slug']) }}" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">{{ $item['name'] }}</div>
                                                   <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; line-height: 2; color: #ff0000;">Rs {{ number_format($price * $item['quantity'],2) }}</div>
                                                   <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; line-height: 2; color: #a0a0a0;">Quantity: {{ $item['quantity'] }}</div>
                                             </div>
                                          </td>
                                       </tr>
                                 </table>
                              </td>
                           </tr>
                           @php
                              $i++;
                           @endphp
                        @endforeach
                        @php
                           $discount += (float)$vendor_data['discount'];
                        @endphp
                    @endforeach
                </table>
            </div>
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: none;">
                <table style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%;" width="100%">
                    <tr>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #b5b5b5;">Subtotal:</div>
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: right;"
                            align="right">
                            <div>${{ number_format($order['sub_total'], 2) }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #b5b5b5;">Shipping Fee:</div>
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: right;"
                            align="right">
                            <div>${{ number_format( $order['shipping_fee'], 2) }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #b5b5b5;">Total saving:</div>
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: right;"
                            align="right">
                            <div>$ {{ number_format($discount, 2) }}</div>
                        </td>
                    </tr>
                    <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #ff0000;">
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <div>Total:</div>
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: right;"
                            align="right">
                            <div>${{ number_format($order['grand_total'], 2) }}</div>
                        </td>
                    </tr>
                </table>
            </div>
<!--            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: none;">
                <table style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%;" width="100%">
                    <tr >
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <div class="dim-title">Shipping option:</div>
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: right;"
                            align="right">
                            <div style="text-transform: uppercase;">STANDARD</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <div class="dim-title">Paid by:</div>
                        </td>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: right;"
                            align="right">
                            <div style="text-transform: uppercase;">cod</div>
                        </td>
                    </tr>
                </table>
            </div>-->
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: none; border-bottom: none;">
                <div class="helpcontent" style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">

                    <table class="sub-heading"
                        style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 100%; margin-bottom: 10px;" width="100%">
                        <tr style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; width: 36px;" width="36">
                                <img src="{{ url('img/search-notebook-icon.png') }}" alt="Need-Help-Icon" style="width: 30px;" />
                            </td>
                            <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                                <h4
                                    style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-transform: uppercase; font-weight: 500; color: #418ffe;">
                                    Need Help?</h4>
                            </td>
                        </tr>
                    </table>
                    
                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; font-weight: 600; color: #000; margin-bottom: 10px;">Will there be delivery delay due to COVID-19?</p>
                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; margin-bottom: 20px;">
                        Due to the government recent COVID-19 restrictions, your order can be delayed. You will be notified through sms
                        or email in case of delay.
                    </p>

                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; font-weight: 600; color: #000; margin-bottom: 10px;">Can I change my shipping address after I have placed
                        the order?</p>
                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; margin-bottom: 20px;">
                        Unfortunatly you cannot change the address, but you may cancel and re-order with right address. (you cannot
                        cancel if the order is shipped already)
                    </p>

                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; font-weight: 600; color: #000; margin-bottom: 10px;">Will somebody contact me before delivering the package
                        to my location?</p>
                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; margin-bottom: 20px;">Our delivery hero may contact you to confirm your location, you will also recieve a
                        SMS/Email on the day of delivery.</p>

                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; font-weight: 600; color: #000; margin-bottom: 10px;">How do I cancel my order?</p>
                    <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">click on 'My Account' and click on 'My Orders', once you see your order, click the cancel button and fill the
                        cancelation reason and submit.</p>
                </div>
            </div>
            <div
                style="margin: 0; font-family: 'Work Sans', sans-serif; background: #418ffe; color: #fff; padding: 10px; text-align: center; border-right: 1px solid #ddd; border-left: 1px solid #ddd;">
                Still have Question? Go to helpcenter
            </div>
            <div class="section" style="margin: 0; font-family: 'Work Sans', sans-serif; padding: 4%; border: 2px solid #ddd; border-top: none;">
                <h4 style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-transform: uppercase; font-weight: 500; color: #418ffe;">Notes</h4>
                <p style="padding: 0; font-family: 'Work Sans', sans-serif; margin: 15px 0px;">For more information, visit our <a href="{{ url('contact') }}">Help Center</a> or check our <a href="{{ url('pages/returns-refunds-and-exchanges') }}">return policy</a> here.?</p>
                <p style="padding: 0; font-family: 'Work Sans', sans-serif; margin: 15px 0px;">Please also note that any transaction made off the DVM Central platform violate our Terms of Service.</p>
                <p style="padding: 0; font-family: 'Work Sans', sans-serif; margin: 15px 0px;">If a seller on DVM Central ask you to pay off-site or through another channel, please do not send them money and report the matter to us.</p>
                <table>
                    <tr>
                        <td style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif;">
                            <a href="https://www.facebook.com/likegervetusa" style="text-decoration: none;margin-right: 5px;"> <img
                                    src="{{ url('img/facebook.png') }}" alt="faebook" style="width: 24px;" /> </a>
                            <a href="https://www.linkedin.com/company/gervetusa" style="text-decoration: none;margin-right: 5px;"> <img
                                    src="{{ url('img/linkedin.png') }}" alt="linkedin" style="width: 24px;" /> </a>
                            <a href="https://www.instagram.com/gervetusa" style="text-decoration: none;margin-right: 5px;"> <img
                                    src="{{ url('img/instagram.png') }}" alt="instagram" style="width: 24px;" /> </a>
                            <a href="https://twitter.com/GerVetUSA" style="text-decoration: none;margin-right: 5px;"> <img src="{{ url('img/twitter.png') }}"
                                    alt="twitter" style="width: 24px;" /> </a>
                        </td>
                        <td></td>
                    </tr>
                </table>
                <div style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; text-align: center;">
                    <h4
                        style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; color: #418ffe; font-weight: 500; text-transform: uppercase;">
                        Help Center | Contact US</h4>
                    <p style="padding: 0; font-family: 'Work Sans', sans-serif; font-size: 12px; max-width: 400px; margin: 0 auto;">
                        63/B Liberty Homes, Opposite Hijaz Hospital, Lahore - Gulberg, Punjab</p>
                    <img src="{{ url('static/img/vet-and-tech-logo.png') }}" alt=""
                        style="padding: 0; font-family: 'Work Sans', sans-serif; width: 100px; margin: 10px auto;" width="100">
                </div>
                <p style="padding: 0; margin: 0; font-family: 'Work Sans', sans-serif; font-size: 10px; text-align: center;">
                    This is an automatic generated e-mail from our subscription list. Please do not reply to this
                    e-mail.</p>
            </div>
        </div>
    </div>
</body>

</html>