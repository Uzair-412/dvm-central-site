<div style="margin:0 auto;">
    <table border="0" width="550">
        <tbody>
            <tr>
                <td style="width: 98.1795%;" colspan="2" align="center"><img src="https://vo.germedusait.com/static/img/vetonly_logo.png" width="350" /></td>
            </tr>
            <tr>
                <td style="width: 98.1795%;" colspan="2" align="center">
                    <h2>Thank you for your purchase!</h2>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <p>Your order # is: <strong>{{ $order->id }}</strong></p>
                    <h3 class="pb-2">Shipping Details:</h3>
                    <p>{{ $order->address1 . ' ' . $order->address2 }} <br /> {{ $order->city . ', ' . $order->zip_code . ', ' . $order->state_name . ', ' . $order->country_name }}</p>
                    <p>Shipping Service: <strong>{{ $order->shipping_service }}</strong></p>
                    <h3 class="pb-2">Order Amounts:</h3>
                    <p>Sub Total: <strong>${{ number_format($order->sub_total, 2) }}</strong></p>
                    <p>Discount: <strong>${{ number_format($order->discount, 2) }}</strong></p>
                    <p>Shipping: <strong>${{ number_format($order->shipping_fee, 2) }}</strong></p>
                    @if($order->engraving_charges > 0)
                        <p>Custom Marking Charges: <strong>${{ number_format($order->engraving_charges, 2) }}</strong></p>
                    @endif
                    <p>Grand Total: <strong>${{ number_format($order->grand_total, 2) }}</strong></p>
                </td>
                <td valign="top" width="40%"><img src="https://vo.germedusait.com/static/image/tick.png" alt="" width="250" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center" valign="top">
                    <p><a href="https://www.vo.germedusait.com/track-your-order?tracking_code={{ $order->id }}">For order tracking, click here.</a></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
