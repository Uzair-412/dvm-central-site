<?php

namespace App\Http\Livewire;

use App\Models\EvFile;
use Livewire\Component;
use App\Models\EvProduct;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $exhibitor_data, $mode = 'add';
    public $product_id, $image1, $image2, $image3, $image1_e, $image2_e, $image3_e, $name, $description, $link, $price, $price_sale; // form fields, putting them separate

    protected $listeners = ['editProduct' => 'edit_product', 'addProduct' => 'add_product'];

    protected $rules = [
        'name'          => 'required',
        'description'   => 'required|max:400',
        'price'         => 'sometimes|numeric',
        'price_sale'    => 'sometimes|numeric',
        'link'          => 'sometimes|url',
        'image1'        => 'required|image|dimensions:width=600,height=600|max:500',
        'image2'        => 'sometimes|image|dimensions:width=600,height=600|max:500',
        'image3'        => 'sometimes|image|dimensions:width=600,height=600|max:500',
    ];

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.product-edit');
    }

    public function save()
    {
        // Livewire making a mess, "sometimes" condition not working
        if(trim($this->name) == null)
            $this->name = '';

        if(trim($this->description) == null)
            $this->description = '';

        if(trim($this->price) == null)
            $this->price = '';

        if(trim($this->price_sale) == null)
            $this->price_sale = '';

        if(trim($this->link) == null)
            $this->link = '';    
        
        if(trim($this->image1) == null)
            $this->image1 = '';    

        if(trim($this->image2) == null)
            $this->image2 = '';    

        if(trim($this->image3) == null)
            $this->image3 = '';    
        
        // Livewire making a mess, "sometimes" condition not working

        $rules = $this->rules;

        if($this->mode == 'edit')
        {
            $rules['image1'] = 'sometimes|image|dimensions:width=600,height=600|max:500';
        }

        $this->validate($rules);

        $data = [   'ev_id' => $this->exhibitor_data->id, 
                    'name' => $this->name,
                    'description' => $this->description
                ];             

        if(trim($this->link != null))
        {
            $data['link'] = $this->link;
        }

        if(trim($this->price != null))
        {
            $data['price'] = $this->price;
        }

        if(trim($this->price_sale != null))
        {
            $data['price_sale'] = $this->price_sale;
        }      

        if($this->product_id)
        {
            $product = EvProduct::find($this->product_id);
            $product->update($data);   
        }
        else
        {
            $product = EvProduct::create($data);
        }

        if($this->image1)
        {
            if($product->image1 != '')
            {
                $file_path = 'up_data/'.$product->image1;
                if(file_exists($file_path))
                    unlink($file_path);
            }

            $product->update([
                'image1' => $this->image1->store('events/products', 'ds3')
            ]);
        }

        if($this->image2)
        {
            if($product->image2 != '')
            {
                $file_path = 'up_data/'.$product->image2;
                if(file_exists($file_path))
                    unlink($file_path);
            }
            
            $product->update([
                'image2' => $this->image2->store('events/products', 'ds3')
            ]);
        }

        if($this->image3)
        {
            if($product->image3 != '')
            {
                $file_path = 'up_data/'.$product->image3;
                if(file_exists($file_path))
                    unlink($file_path);
            }

            $product->update([
                'image3' => $this->image3->store('events/products', 'ds3')
            ]);
        }

        $this->reset_fields();

        if($this->mode == 'add')
            $message = 'Product added!';
        else 
            $message = 'Product updated!';
        
            $this->notify($message);
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('productsUpdated');
    }

    public function add_product()
    {
        $this->reset_fields();

        $this->dispatchBrowserEvent('edit_product_click');

        $this->mode = 'add';

        $this->render();
    }

    public function edit_product($id)
    {
        $this->reset_fields();

        $product = EvProduct::find($id);

        $this->product_id = $product->id;
        $this->image1_e = $product->image1; 
        $this->image2_e = $product->image2;
        $this->image3_e = $product->image3;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->link = $product->link;
        $this->price = $product->price;
        $this->price_sale = $product->price_sale;

        $this->dispatchBrowserEvent('edit_product_click');

        $this->mode = 'edit';

        $this->render();
    }

    public function reset_fields()
    {
        $this->product_id = $this->name = $this->description = $this->link = $this->price = 
        $this->price_sale = $this->image1 = $this->image2 = $this->image3 =
        $this->image1_e = $this->image2_e = $this->image3_e = null;
    }
}
