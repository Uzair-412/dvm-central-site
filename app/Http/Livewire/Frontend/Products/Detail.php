<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Http\Controllers\Frontend\CartController;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Review;
use DB;
use Livewire\Component;
use Illuminate\Http\Request;

class Detail extends Component
{
    public $product, $sub_products, $images, $stock_info,$chat_data,$vendor_id,
    $product_categories, $ratings, $warranty, $related_products, $same_products, $quantity=1;
    public $reviews, $totalReviews, $startReviews=[], $customerReviews, $add_to_cart_error, $sub_product_id=null;

    // Product details
    public $name, $product_description, $product_full_description, $sku, $isStock=false, $additional_information, $price_info, $discount;
    
    public function mount()
    {
        $this->reviews = Product::getReviews($this->product->id);

        // get product overall active rating total
        $productRating = Review::where([
            ['product_id', $this->product->id],
            ['status','=','Y']
            ])->select(DB::raw('COUNT(*) as total'))->first();
        $this->totalReviews = $productRating->total;

        // get product star active rating total
        $productStarRating = Review::where([
            ['product_id', $this->product->id],
            ['rating','!=',0],
            ['status','=','Y']
            ])->select(DB::raw('COUNT(*) as total'))->first();

        // get product star active rating from 1 to 5 in array
        for($i=5; $i>0; $i--)
        {
            $reviews = Review::where([
            ['product_id', $this->product->id],
            ['rating','=',$i],
            ['status','=','Y']
            ])->select(DB::raw('COUNT(*) as currentRating'))->first();
            $this->startReviews[$i] = (float)$productStarRating->total!=0 ? number_format(((float)$reviews->currentRating/(float)$productStarRating->total) * 100,2) : 0;
        }

        // get customer reviews by product
        $this->customerReviews = Review::where([
            ['status','=','Y'],
            ['product_id', $this->product->id]
        ])->orderBy('id','DESC')->get();
        $this->setDetails($this->product->id);
    }

    public function render()
    {   
        $this->product_categories = $this->product->categories()->select('name','slug','show_prices','banner_id')->where('status', 'Y')->get();
        return view('livewire.frontend.products.detail');
    }

    public function updatedSubProductId($value)
    {
        if($value!=='')
        {
            $product_id = $value;
        }
        else
        {
            $product_id = $this->product->id;
        }
        $this->setDetails($product_id);
        $this->dispatchBrowserEvent('on_change_variation', [
            'value' => $value,
        ]);
    }

    public function setDetails($product_id)
    {
        $product = Product::find($product_id);
        $this->name = $product->name;
        $this->product_description = $product->short_description;
        $this->product_full_description = $product->product_full_description;
        $this->additional_information = $product->additional_information;
        $this->sku = $product->sku;
        $this->price_info = Product::getPriceText($product, 'detail');
        if ((float) $this->price_info['sale_price'] != 0) {
            $this->discount = (((float) $this->price_info['price'] - (float) $this->price_info['sale_price']) / (float) $this->price_info['price']) * 100;
        }
        if($product->type != 'variation' && $product->quantity > 0)
        {
            $this->isStock = true;
        }
        else
        {
            $this->isStock = false;
        }
    }

    public function add_to_cart(Request $request)
    {
        $this->add_to_cart_error = '';
        $result = $this->saveToCart();
        if($result['status']!=1)
        {
            $this->add_to_cart_error = $result['message'];
        }
        else
        {
            if($this->sub_product_id == null)
            {
                $product_id = $this->product->id;
            }
            else
            {
                $product_id = $this->sub_product_id;
            }
            $this->emit('showMessageForAddToCart', $product_id);
        }
        $this->dispatchBrowserEvent('on_change_variation', [
            'value' => true,
        ]);
    }

    public function saveToCart()
    {
        if(!auth()->user())
        {
            return ['status' => 0, 'message' => 'Please login before continuing shopping!'];
        }

        if($this->quantity < 1){
            return ['status' => 2, 'message' => 'Please Add Product Quantity To Proceed'];
        }
        $user = Customer::find(auth()->user()->id);
        if(auth()->user()->email_verified_at==null)
        {
            return ['status' => 2, 'message' => 'Please verify your email before continuing shopping!'];
        }
        if($this->sub_product_id == null)
        {
            $product = $this->product;
        }
        else
        {
            $product = Product::find($this->sub_product_id);
        }
        $product_cart = product_cart(session()->get('rand_num'));
        $data = array('product_id' => $product->id, 'qty' => $this->quantity);

        if($user->level < $product->level)
        {
            return ['status' => 2, 'message' => 'This product is only available for level '.$product->level.' customers!'];
        }
        $cart_item = @$product_cart->get($product->id);
        $current_quantity = @(int)$cart_item->quantity+(int)$this->quantity;
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

    public function updateQuantity($type='plus') // type can be 'plus' or 'minus'
    {
        if($type=='minus')
        {
            if($this->quantity < 1)
            {
                $this->quantity=1;
            }
            else
            {
                $this->quantity--;
            }
        }
        else
        {
            $this->quantity++;
        }
        $this->dispatchBrowserEvent('on_change_variation', [
            'value' => true,
        ]);
    }
}
