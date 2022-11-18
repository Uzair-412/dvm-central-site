Dear Admin!,<br>
<br>
A new show order has been created, following are the details:

<h1>Customer Information:</h1>

<table width="100%" border="1" cellspacing="0" cellpadding="3">
    <tr>
        <td width="30%"><strong>Name:</strong></td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <td><strong>Phone:</strong></td>
        <td>{{ $data->phone }}</td>
    </tr>
    <tr>
        <td><strong>Address Line 1:</strong></td>
        <td>{{ $data->address1 }}</td>
    </tr>
    <tr>
        <td><strong>Address Line 2:</strong></td>
        <td>{{ $data->address2 }}</td>
    </tr>
    <tr>
        <td><strong>City:</strong></td>
        <td>{{ $data->city }}</td>
    </tr>
    <tr>
        <td><strong>State:</strong></td>
        <td>{{ $data->state }}</td>
    </tr>
    <tr>
        <td><strong>Zip / Post Code:</strong></td>
        <td>{{ $data->zip }}</td>
    </tr>
    <tr>
        <td><strong>Country:</strong></td>
        <td>{{ $data->country }}</td>
    </tr>
    <tr>
        <td><strong>Notes:</strong></td>
        <td>{{ $data->notes }}</td>
    </tr>
</table>


<h2>Order Information</h2>

<table border="1" width="100%" cellspacing="0" cellpadding="3">
    <tr>
        <td width="50%"><strong>Name / SKU</strong></td>
        <td width="20%"><strong>Price</strong></td>
        <td width="10%"><strong>QTY</strong></td>
        <td width="20%"><strong>Total</strong></td>
    </tr>
    @foreach($data->items as $item)
        <tr>
            <td>{{ $item['name'] }} <br> <strong>{{ $item['sku'] }}</strong></td>
            <td>
                <div style="text-decoration: line-through; color:#FF0000;">${{ $item['price_org'] }}</div>
                <div>${{ $item['price'] }}</div>
            </td>
            <td>{{ $item['qty'] }}</td>
            <td>
                <div style="text-decoration: line-through; color:#FF0000;">${{ ( $item['price_org'] * $item['qty'] ) }}</div>
                <div>${{ ( $item['price'] * $item['qty'] ) }}</div>
            </td>
        </tr>
    @endforeach
</table>

<br>
<br>

<table width="100%" border="1" cellspacing="0" cellpadding="3">
    <tr>
        <td width="30%"><strong>Sub Total:</strong></td>
        <td><strong>${{ $data->sub_total }}</td>
    </tr>
    <tr>
        <td style="color:#FF0000;"><strong>Discount:</strong></td>
        <td style="color:#FF0000;">${{ $data->discount }}</td>
    </tr>
    <tr>
        <td><strong>Grand Total:</strong></td>
        <td>${{ $data->grand_total }}</td>
    </tr>
</table>

@if($data->payment_reference)
    <br>
    <br>

    <table width="100%" border="1" cellspacing="0" cellpadding="3">
        <tr>
            <td width="30%"><strong>Payment Reference <em>(Stripe)</em>:</strong></td>
            <td>{{ $data->payment_reference }}</td>
        </tr>
    </table>
@endif

<br>
<br>
Thank You,
<br/>
<i>GerVetUSA Show Order App</i>