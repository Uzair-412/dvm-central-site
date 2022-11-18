<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\Address as ModelsAddress;
use App\Models\Country;
use App\Models\State;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Address extends Component
{
    use WithPagination;
    public $is_create_address=false, $address, $addressid;

    public function render()
    {
        $id =  Auth::user()->id;
        $data['addresses'] = ModelsAddress::where('customer_id',$id)->orderBy('id', 'desc')->get();
        $data['countries'] = Country::pluck('name', 'id');
        return view('livewire.frontend.dashboard.address', $data);
    }

    public function createAddress($bool)
    {
        $this->is_create_address = $bool;
        $this->address='';
    }

    public function setAddress($id)
    {
        $this->address = ModelsAddress::find($id);
    }

    public function destroy()
    {
        $address = ModelsAddress::find($this->addressid);
        $address->delete();
        $this->resetPage();
        $this->addressid = null;
    }

    public function delete_address_func($value)
    {
        $this->addressid = $value;
    }

    public function cancelDel()
    {
        $this->addressid = null;
    }
}
