<div class="col-lg-3 col-12">
    <div class="myaccount-tab-menu nav">
        <a href="/dashboard" @if($data['page'] == 'Dashboard') class="active" @endif><i class="fa fa-tachometer"></i>Dashboard</a>
        <a href="/dashboard/orders" @if($data['page'] == 'orders') class="active" @endif><i class="fa fa-cart-arrow-down"></i> Orders</a>
        {{--<a href="/dashboard/invoices" @if($data['page'] == 'invoices') class="active" @endif><i class="fas fa-credit-card"></i> Invoices</a>--}}
        <a href="/dashboard/payment-history" @if($data['page'] == 'payment-history') class="active" @endif><i class="fa fa-money"></i> Payment History</a>
        <a href="/dashboard/addresses" @if($data['page'] == 'addresses') class="active" @endif><i class="fa fa-map"></i> My Address</a>
        <a href="/dashboard/profile" @if($data['page'] == 'profile') class="active" @endif><i class="fa fa-user"></i> Profile</a>
        {{--<a href="/dashboard/change-password" @if($data['page'] == 'change-password') class="active" @endif><i class="fa fa-key"></i> Change Password</a>--}}
        <a href="/dashboard/wishlist" @if($data['page'] == 'wishlist') class="active" @endif><i class="fa fa-heart"></i> Wishlist</a>
        <a href="{{ route('frontend.auth.logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</div>