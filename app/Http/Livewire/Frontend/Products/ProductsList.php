<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Http\Controllers\Frontend\CartController;
use App\Models\Customer;
use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public $products=[], $type='list', $caption, $allowCaption=false;

    public function mount($products_list)
    {
        foreach($products_list as $product)
        {
            if(!empty($product)) {
                $this->products[] = $product;
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.products.products-list');
    }

    public function add_to_cart($product_id)
    {
        $result = $this->saveToCart($product_id);
        if($result['status']!=1)
        {
            $this->dispatchBrowserEvent('error_add_to_cart', [
                'error' => $result['message'],
                'status' => $result['status']
            ]);
        }
        else
        {
            $this->emit('showMessageForAddToCart', $product_id);
        }
    }

    public function saveToCart($product_id)
    {
        $quantity = 1;
        $product = Product::find($product_id);
        if(!auth()->user())
        {
            return ['status' => 0, 'message' => 'Please login before continuing shopping!'];
        }
        $user = Customer::find(auth()->user()->id);
        if(auth()->user()->email_verified_at==null)
        {
            return ['status' => 2, 'message' => 'Please verify your email before continuing shopping!'];
        }
        $product_cart = product_cart(session()->get('rand_num'));
        $data = array('product_id' => $product->id, 'qty' => $quantity);

        if($user->level < $product->level)
        {
            return ['status' => 2, 'message' => 'This product is only available for level '.$product->level.' customers!'];
        }
        $cart_item = @$product_cart->get($product->id);
        $current_quantity = @(int)$cart_item->quantity+(int)$quantity;
        if($current_quantity > (int)$product->quantity)
        {
            if($product->quantity == 0){
                return ['status' => 2, 'message' => 'Product is out of stock'];
            }
            else
            {
                return ['status' => 2, 'message' => 'Quantity exceeded, Max stock available is '.(int)$product->quantity];
            }
        }
        $cartController = new CartController();
        $cartController->addToCart($data);
        return ['status' => 1, 'message' => 'Product successfully added to shopping cart.'];
    }
}
