<?php

namespace App\Http\Livewire;

use App\Models\EvFile;
use Livewire\Component;

class FilesList extends Component
{    
    public $exhibitor_data, $edit_mode, $files;
    
    protected $listeners = ['filesUpdated' => 'mount'];

    public function mount()
    {
        $this->files = EvFile::where('ev_id', $this->exhibitor_data->id)->get();
    }

    public function destroy($file_id)
    {
        $file = EvFile::find($file_id);
        if($file->type == 'file')
        {
            $file_path = 'up_data/'.$file->file_name;
            if(file_exists($file_path))
                unlink($file_path);
        }
        $file->delete();
        $this->notify('Document / Link deleted!');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.files-list');
    }
}
