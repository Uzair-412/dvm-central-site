<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use App\Models\Category;
use App\Models\Country;
use Livewire\Component;
use App\Models\AnimalPet;
use App\Models\JobCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
class Navigation extends Component
{
    public $menu_categories, $countries, $all_animals=[], $same_products=[], $isShowMessageForAddToCart=false;
    
    protected $listeners = ['showMessageForAddToCart' => 'showMessageForAddToCart'];

    public function mount()
    {
        $this->menu_categories = Category::where('parent_id',0)->get();
        $this->countries = Country::orderBy('name','ASC')->get();
        $this->all_animals = AnimalPet::all();
        $this->job_categories = JobCategory::getJobs();
    }

    public function render()
    {
        return view('livewire.frontend.includes.partials.navigation');
    }

    public function showMessageForAddToCart($product_id)
    {
        $selected_product = Product::where(['id' => $product_id, 'status' => 'Y'])->first();
        if($selected_product->type=='simple')
        {
            $products = Product::where(['vendor_id' => $selected_product->vendor_id, 'status' => 'Y']);
        }
        else {
            $parent = Product::where(['id' => $selected_product->parent_id, 'status' => 'Y'])->first();
            if(isset($parent)){
                    $products = Product::where(['vendor_id' => $parent->vendor_id, 'status' => 'Y'])->where([
                    ['type', '!=', 'child'],
                    ['id', '!=' , $parent->id]
                ]);
            }
        }
        $this->same_products = $products->where('id', '!=' , $product_id)->inRandomOrder()->get()->take(6);
        $this->emit('updateMiniCart');
        // $same_products = [];
        // foreach($products as $key=> $product)
        // {
        //     $url = $product->slug;

        //     if ($product->type == 'child' && $product->show_individual == 'N') {
        //         $url = Product::getParentSlug($product->id) . '#' . $product->sku;
        //     } else if ($product->show_individual == 'Y' && $product->link_type == 'variation') {
        //         $url = Product::getParentSlug($product->id) . '#' . $product->sku;
        //     }
        //     $same_products[$key]['url'] = $url;
        //     $img_path = 'products/images/thumbnails/' . $product->image;
        //     $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) :
        //         'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
        //     $same_products[$key]['path'] = $path;
        //     $product->on_sale = false;

        //     $info = Product::getPriceText($product);
        //     $same_products[$key]['info'] = $info;
        //     $caption = '';

        //     if ($product->new == 'Y')
        //         $caption = 'New!';
        //     else if ($product->hot == 'Y')
        //         $caption = 'Hot!';
        //     else if ($product->featured == 'Y')
        //         $caption = 'Featured!';
        //     else if ($product->deals_of_the_day == 'Y')
        //         $caption = 'Deals Of The Day!';
        //     else if ($product->related_products == 'Y')
        //         $caption = 'Deals Of The Day!';

        //     if ($product->on_sale)
        //         $caption = 'Sale!';
        //     $same_products[$key]['caption'] = $caption;
        //     $same_products[$key]['alt'] = Str::replace('"', ' inch', $product->name);
        //     $same_products[$key]['name'] = $product->name;
        //     $same_products[$key]['vendor']['slug'] = @$product->vendor['slug'];
        //     $same_products[$key]['vendor']['name'] = @$product->vendor['name'];
        // }
        $this->dispatchBrowserEvent('addedInCart', [
            'message' => 'Product successfully added to shopping cart.'
        ]);
        $this->isShowMessageForAddToCart=true;
    }

    public function closeMessageForAddToCart()
    {
        $this->isShowMessageForAddToCart=false;
        $this->same_products = [];
    }
}
