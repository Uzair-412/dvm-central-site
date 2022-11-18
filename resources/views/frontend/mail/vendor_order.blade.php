Dear {{ $vendor_user->first_name }} {{ $vendor_user->last_name }}!,<br>
<br>
A new order has been created by customer, following are the details:

<h1>Customer Information:</h1>

<table width="100%" border="1" cellspacing="0" cellpadding="3">
    <tr>
        <td width="30%"><strong>Name:</strong></td>
        <td>{{ $customer['first_name'] }} {{ $customer['last_name'] }}</td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td>{{ $customer['email'] }}</td>
    </tr>
    <tr>
        <td><strong>Phone:</strong></td>
        <td>{{ $customer['phone'] }}</td>
    </tr>
    <tr>
        <td><strong>Address Line 1:</strong></td>
        <td>{{ $customer['address1'] }}</td>
    </tr>
    <tr>
        <td><strong>Address Line 2:</strong></td>
        <td>{{ $customer['address2'] }}</td>
    </tr>
    <tr>
        <td><strong>City:</strong></td>
        <td>{{ $customer['city'] }}</td>
    </tr>
    <tr>
        <td><strong>State:</strong></td>
        @php
            $state = \App\Models\State::where('iso2',$customer['state'])->first();
        @endphp
        <td>{{ $state->name }}</td>
    </tr>
    <tr>
        <td><strong>Zip / Post Code:</strong></td>
        <td>{{ $customer['zip'] }}</td>
    </tr>
    <tr>
        <td><strong>Country:</strong></td>
        @php
            $country = \App\Models\Country::find($customer['country']);
        @endphp
        <td>{{ $country->name }}</td>
    </tr>
    <tr>
        <td><strong>Notes:</strong></td>
        <td>{{ $customer['notes'] }}</td>
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
    @foreach($vendor_items as $item)
    <tr>
        <td>{{ $item['name'] }} <br> <strong>{{ $item['attributes']['sku'] }}</strong></td>
        <td>
            @if((int)$item['attributes']['discount'] > 0)
                <div style="text-decoration: line-through; color:#FF0000;">${{ $item['attributes']['price_catalog'] }}</div>
                <div>${{ $item['attributes']['price_discounted'] }}</div>
            @else
                <div>${{ $item['price'] }}</div>
            @endif
        </td>
        <td>{{ $item['quantity'] }}</td>
        <td>
            @if((int)$item['attributes']['discount'] > 0)
                <div style="text-decoration: line-through; color:#FF0000;">
                    ${{ ( (int)$item['attributes']['price_catalog'] * $item['quantity'] ) }}
                </div>
            @endif
            <div>${{ ( (int)$item['attributes']['discount']==0 ? $item['attributes']['price_catalog'] * $item['quantity'] : $item['attributes']['price_discounted'] * $item['quantity'] ) }}</div>
        </td>
    </tr>
    @endforeach
</table>

<br>
<br>
Thank You,
<br />
<i>VetandTech Order App</i>