<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EvProduct;

class ProductList extends Component
{
    public $exhibitor_data, $edit_mode, $products, $counter;
    public $max_products = 10;
    public $total_products = 0;
    public $add_more = true;
    
    protected $listeners = ['jobsUpdated' => 'mount'];

    public function mount()
    {
        $this->products = EvProduct::where('ev_id', $this->exhibitor_data->id)->get();
        $this->total_products = count($this->products);
        $this->counter = '('. $this->total_products .' / '. $this->max_products .')';
    }

    public function destroy($product_id)
    {
        $product = EvProduct::find($product_id);
        if($product->image1 != '')
        {
            $file_path = 'up_data/'.$product->image1;
            if(file_exists($file_path))
                unlink($file_path);
        }

        if($product->image2 != '')
        {
            $file_path = 'up_data/'.$product->image2;
            if(file_exists($file_path))
                unlink($file_path);
        }

        if($product->image3 != '')
        {
            $file_path = 'up_data/'.$product->image3;
            if(file_exists($file_path))
                unlink($file_path);
        }

        $product->delete();
        $this->notify('Product deleted!');
        $this->mount();
    }

    public function open_product($id)
    {
        $product = EvProduct::find($id);
        
        $this->dispatchBrowserEvent('open_product_modal', $product);
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
