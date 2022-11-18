<div style="margin:0 auto;">
    <table border="0" width="550">
        <tbody>
        <tr>
            <td style="width: 98.1795%;" align="center"><img src="https://vo.germedusait.com/static/img/vetonly_logo.png" width="350" /></td>
        </tr>
        <tr>
            <td style="width: 98.1795%;" align="center">
                <h2>Status Update for Your Order # {{ $order->order_id }}</h2>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p><strong>Current Status:</strong> {{ \App\Models\Order::$statuses[$order->order_status] }}</p>

                @if($order->ups_tracking_id)
                    <p><strong>Shipping Tracking ID:</strong> {{ $order->ups_tracking_id }}</p>
                @endif

                <p><strong>Subject:</strong> {{ $order->subject }}</p>
                <p><strong>Message:</strong> {!! nl2br($order->message) !!}</p>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top">
                <p><a href="https://vo.germedusait.com/track-your-order?tracking_code={{ $order->order_id }}">For order tracking, click here.</a></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>